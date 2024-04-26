<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class PatientController extends Controller
{
    // patient dashboard route
    public function dashboard()
    {
        return view('patient.dashboard');
    }

    // patient profile route
    public function PatientSettings()
    {
        return view('patient.settings.profile');
    }

    // patient regisration
    public function createPatient(Request $request)
    {
        $validatedData = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'nic' => ['nullable', 'string', 'regex:/^(?:\d{9}[VX]|\d{12})$/'],
            'passport' => 'nullable|string',
            'nationality' => 'required|string',
            'phone' => 'nullable|string|max:13|min:10',
            'password' => 'required|string|min:8|max:255|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).*$/',
        ]);
    
        $user = User::create([
            'name' => $validatedData['FirstName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        $nicOrPassport = $request->input('nationality') === 'Local' ? $validatedData['nic'] : $validatedData['passport'];
    
        $user->assignRole('patient'); // Ensure you have roles set up correctly
    
        $patient = new Patient([
            'last_name' => $validatedData['LastName'],
            'nic' => $request->input('nationality') === 'Local' ? $nicOrPassport : null,
            'passport' => $request->input('nationality') !== 'Local' ? $nicOrPassport : null,
            'phone' => $validatedData['phone'],
            'nationality' => $validatedData['nationality'],
            'user_id' => $user->id,
        ]);
        $patient->save();
    
        // Determine if the registration is by admin
        if ($request->input('registered_by_admin') == 'yes') {
    
            return redirect()->route('PatientsManagement');
        } else {
            // Log in the user immediately
            auth()->login($user);
    
            // Redirect user to set new password on first login
            return redirect()->route('PatientDashboard')->with('first_login', 'true');
        }
    }
    

}
