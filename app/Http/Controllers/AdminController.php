<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Centre;
use App\Models\Member;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PatientController;


class AdminController extends Controller
{

    //auto logout
    public function autoLogout(Request $request)
    {
        Auth::logout();  // Log out the user

        $request->session()->invalidate();  // Invalidate the session
        $request->session()->regenerateToken();  // Regenerate the CSRF token



        return redirect('login');  // Redirect to login page with a message
    }

    // Admin dashboard route
    public function dashboard()
    {

        $pendingAppointments = Appointment::where('status', 'pending')->get();

        $completedAppointments = Appointment::where('status', 'completed')->get();

        $totalCenterCharge = Appointment::sum('center_charge');

        $totalDoctorCharge = Appointment::sum('doctor_charge');

        $centers = Centre::get();


        
        $centerChargesByCenter = Appointment::selectRaw('centres.centre_name as center_name, SUM(appointments.center_charge) as total_center_charge')
        ->join('centres', 'appointments.centre_id', '=', 'centres.id')
        ->groupBy('appointments.centre_id', 'centres.centre_name')
        ->get();

        return view('admin.dashboard', compact('pendingAppointments', 'completedAppointments', 'totalCenterCharge', 'totalDoctorCharge','centerChargesByCenter'));
    } 

    // Patients Management
    //1. Pateint List
    public function PatientsManagement()
    {
        // Fetch all patients with associated user details, ordered by most recent
        $patients = Patient::with('user')->orderBy('created_at', 'desc')->get();
        
        // Pass the patients to the view using compact
        return view('admin.users.patients', compact('patients'));
    }   


     //2. Pateint Add
    protected $patientController;

    public function __construct(PatientController $patientController)
    {
        $this->patientController = $patientController;
    }

    public function PatientsManagementAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            // Forward the handling to PatientController
            return $this->patientController->createPatient($request);
        }

        return view('admin.users.patients-add');
    }

    // Patient data route
    public function AdminPayments()
    {
        return view('admin.payments');
    }

    // Admin Member Management
    //1. Members List
    public function MembersManagement()
    {
        // Fetch all Members with associated user details, ordered by most recent
        $members = Member::with('user')->orderBy('created_at', 'desc')->get();
        // Pass the members to the view using compact
        return view('admin.users.members', compact('members'));
    }

    // Edit member edit page
    public function edit($id)
    {

        $member = Member::findOrFail($id);

        return view('admin.users.members-edit', compact('member'));
    }    

    public function deleteMember($id)
    {
        $member = Member::findOrFail($id);

        $user = $member->user;

        $member->delete();

        $user->delete();

        return redirect()->route('MembersManagement')->with('success', 'Member deleted successfully.');
    }

    // Appointments management  route
    public function AppointmentsManagement()
    {

        $bookings = Appointment::get();


        return view('admin.appointments', compact('bookings'));
    
    }

    // Admin Settings route
    public function AdminSettings()
    {
        return view('admin.settings');
    }


    // Member update
    public function memberUpdate(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $user = $member->user;

        $validatedData = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id.'|max:255',
            'nic' => ['nullable', 'string', 'regex:/^(?:\d{9}[VX]|\d{12})$/'],
            'passport' => 'nullable|string',
            'nationality' => 'required|string',
            'phone' => 'nullable|string|max:13|min:10',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'medical_school' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
        ]);

        $user->name = $validatedData['FirstName'];
        $user->email = $validatedData['email'];

        $user->save();

        $nicOrPassport = $request->input('nationality') === 'Local' ? $validatedData['nic'] : $validatedData['passport'];

        $memberData = [
            'last_name' => $validatedData['LastName'],
            'nic' => $request->input('nationality') === 'Local' ? $nicOrPassport : null,
            'passport' => $request->input('nationality') !== 'Local' ? $nicOrPassport : null,
            'phone' => $validatedData['phone'],
            'dob' => $validatedData['dob'],
            'address' => $validatedData['address'],
            'medical_school' => $validatedData['medical_school'],
            'license_number' => $validatedData['license_number'],
            'nationality' => $validatedData['nationality'],
        ];

        $member->update($memberData);

        return redirect()->route('MembersManagement');
    }


    public function fetchDataForChart()
    {
        // Calculate the start date (8 months ago from now)
        $startDate = Carbon::now()->subMonths(7)->startOfMonth();
    
        // Create an array to store the labels
        $labels = [];
    
        // Loop through each month from the start date to the current month
        for ($i = 0; $i < 8; $i++) {
            // Add the formatted month label to the array
            $labels[] = $startDate->format('M Y');
    
            // Move to the next month
            $startDate->addMonth();
        }
    
        // Fetch monthly data for the last 8 months
        $monthlyData = Appointment::select(
                DB::raw('MONTH(appointment_date) as month'),
                DB::raw('YEAR(appointment_date) as year'),
                DB::raw('SUM(doctor_charge) as total_doctor_charge'),
                DB::raw('SUM(center_charge) as total_center_charge')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
    
        // Initialize arrays for doctor charges, center charges, and totals
        $doctorCharges = [];
        $centerCharges = [];
        $totals = [];
    
        // Loop through the labels array and check if the month exists in the fetched data
        foreach ($labels as $label) {
            // Extract month and year from the label
            $monthYear = Carbon::createFromFormat('M Y', $label);
    
            // Find the corresponding data for the current label
            $data = $monthlyData->first(function ($item) use ($monthYear) {
                return $item->month == $monthYear->month && $item->year == $monthYear->year;
            });
    
            // If data exists, add it to the respective arrays; otherwise, add zeros
            if ($data) {
                $doctorCharges[] = $data->total_doctor_charge;
                $centerCharges[] = $data->total_center_charge;
                $totals[] = $data->total_doctor_charge + $data->total_center_charge;
            } else {
                $doctorCharges[] = 0;
                $centerCharges[] = 0;
                $totals[] = 0;
            }
        }
    
        // Return the data as JSON response
        return response()->json([
            'labels' => $labels,
            'doctorCharges' => $doctorCharges,
            'centerCharges' => $centerCharges,
            'totals' => $totals,
        ]);
    }

}