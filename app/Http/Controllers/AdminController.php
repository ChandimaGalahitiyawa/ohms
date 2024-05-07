<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PatientController;
use App\Models\User;


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
        return view('admin.dashboard');
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
        return view('admin.appointments');
    
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

}