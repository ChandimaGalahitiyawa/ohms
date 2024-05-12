<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Member;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $doctorId = $request->doctorId;

        $centerId = $request->centerId;

        $doctor = Member::findOrfail($doctorId);

        $referenceId = $request->referenceId;

        $queueNo = $request->queueNo;

        $total = $request->total;

        $totalInCents = intval(str_replace(',', '', $total)) * 100;

        Session::put('doctor_id', $doctorId);
        Session::put('center_id', $centerId);
        Session::put('referenceId', $referenceId);
        Session::put('queueNo', $queueNo);
        Session::put('total_amount', $total);
        Session::put('date', $request->date);        

        $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));

        $redirectUrl = route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}';
        $response =  $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'payment_method_types' => ['link', 'card'],
            'line_items' => [
                [
                    'price_data'  => [
                        'product_data' => [
                            'name' => $doctor->user->name,
                        ],
                        'unit_amount'  => $totalInCents,
                        'currency'     => 'LKR',
                    ],
                    'quantity'    => 1
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => false
        ]);

        return redirect($response['url']);
    }

    public function stripeCheckoutSuccess(Request $request)
    {
        $doctorId = session('doctor_id');
        $centerId = session('center_id');
        $referenceId = session('referenceId');
        $queueNo = session('queueNo');
        $total = session('total_amount');
        $date = session('date');

        $total = str_replace(',', '', $total);

        $user = Auth::user();

        $patient = $user->patient;

        $doctor = Member::findOrfail($doctorId);

        $doctorCharge = $doctor->specializations->first()->pivot->fee;

        $center = Centre::findOrFail($centerId);

        $centerCharge =  $center->centre_fee;
    
        // Create a new appointment record
        $appointment = new Appointment();
        $appointment->patient_id = $patient->id;
        $appointment->member_id = $doctorId;
        $appointment->centre_id = $centerId;
        $appointment->queue_no = $queueNo;
        $appointment->appointment_time = now();
        $appointment->center_charge = $centerCharge;
        $appointment->doctor_charge = $doctorCharge; 
        $appointment->appointment_date = $date;
        $appointment->reference_id = $referenceId;
        $appointment->total = $total;
        $appointment->status = 'pending';
        $appointment->save();
        
        $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));

        $session = $stripe->checkout->sessions->retrieve($request->session_id);
        info($session);

        $successMessage = "Your Payment Has Been success.";

        $doctor = $appointment->doctor;

        $center =  $appointment->center;

        $date = $appointment->appointment_date;

        $queueNo = $appointment->queue_no;

        $referenceId = $appointment->reference_id;

        $total = $appointment->total;

        return view('patient.successPayment', compact('total','referenceId','queueNo','date','center','doctor','successMessage', 'appointment'));
    }
}
