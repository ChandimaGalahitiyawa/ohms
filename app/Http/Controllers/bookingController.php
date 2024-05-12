<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Centre;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class bookingController extends Controller
{
    public function channelDoctor($id){

        $doctor = Member::findOrfail($id);

        return view('patient.channelDoctor', compact('doctor'));
    }

    public function bookingBilling($doctorId,$centerId, $date){

        $user = Auth::user();

        $doctor = Member::findOrFail($doctorId);

        $center = Centre::findOrFail($centerId);

        $centerCharge = $center->centre_fee;

        $allAppointments = Appointment::get();

        $appointments = Appointment::where('member_id', $doctor->id)->where('appointment_date', $date)->get();

        $appointmentCount = count($appointments);

        $queueNo = $appointmentCount+1;

        $doctorCharge = $doctor->specializations->first()->pivot->fee;

        $total = number_format($centerCharge + $doctorCharge, 2);

        if ($allAppointments->isEmpty()) {
            $referenceId = 999;
        } else {
            $highestReferenceId = $allAppointments->max('reference_id') ?? 0;
            $referenceId = $highestReferenceId + 1;
        }


        return view('patient.bookingBilling', compact('referenceId','queueNo','user','doctor', 'center', 'date', 'total'));
    }

    public function myBookings(){

        $user = Auth::user();

        $patient = $user->patient;

        $mybookings = Appointment::where('patient_id', $patient->id)->get();

        return view('patient.myBookings', compact('mybookings'));
    }


    public function viewAppointment($id){

        
        $appointment = Appointment::findOrFail($id);

        $center = $appointment->center;

        $doctor = $appointment->doctor;

        return view('patient.viewAppointment', compact('appointment', 'center', 'doctor'));
    }

}
