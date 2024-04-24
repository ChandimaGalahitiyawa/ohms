<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    // patient dashboard route
    public function dashboard()
    {
        return view('patient.dashboard');
    }

    public function createPatient(Request $request)
    {
        $validatedData = $request->validate([
            'FirstName' => 'required|string|max:255',  
            'LastName' => 'required|string|max:255',  
            'email' => 'required|email|unique:users,email|max:255', 
            'nic' => ['nullable', 'string', 'regex:/^(?:\d{9}[VX]|\d{12})$/'],
            'phone' => 'nullable|string|max:13|min:10',
            'password' => 'required|string|min:8|max:255|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).*$/',
        ]);
        

        $user = User::create([
            'name' => $validatedData['FirstName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->assignRole('patient'); // Ensure you have roles set up correctly

        $patient = new Patient([
            'last_name' => $validatedData['LastName'],
            'nic' => $validatedData['nic'],
            'phone' => $validatedData['phone'], // Added phone field
            'user_id' => $user->id,
        ]);
        $patient->save();

        if ($patient) {
            auth()->login($user);
        }

        return redirect()->route('PatientDashboard');
    }    
}
