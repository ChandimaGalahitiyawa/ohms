<?php

namespace App\Http\Controllers\admin;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PatientController;

class AdminController extends Controller
{
    // Admin Settings route
    public function AdminSettings()
    {
        return view('admin.settings.profile');
    }

    // Admin dashboard route
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Admin Member Management
    public function MemberManagement()
    {
        return view('admin.users.members');
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

}
