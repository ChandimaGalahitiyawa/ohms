<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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

    // Admin Settings route
    public function AdminSettings()
    {
        return view('admin.settings');
    }

    // Admin dashboard route
    public function dashboard()
    {
        return view('admin.dashboard');
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

}