<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Centre;
use App\Models\Member;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Response;

class PatientController extends Controller
{

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

    // Dashboard route
    public function PatientDashboard(Request $request)
    {
        $members = Member::with('user')->orderBy('created_at', 'desc')->get();
        $centres = Centre::all();
        $specializations = Specialization::whereHas('members')->get();
        $availableMembers = collect();

        return view('patient.dashboard', [
            'members' => $members,
            'centres' => $centres,
            'specializations' => $specializations,
            'availableMembers' => $availableMembers
        ]);
    }

    // Search route
    public function MemberSearch(Request $request)
    {
        $query = Member::query();
    
        // Apply filters based on the request
        if ($request->filled('search_by_doctor')) {
            $query->where('id', $request->search_by_doctor);
        } elseif ($request->filled('search_by_centre')) {
            $query->whereHas('centres', function($q) use ($request) {
                $q->where('id', $request->search_by_centre);
            });
        } elseif ($request->filled('search_by_specialization')) {
            $query->whereHas('specializations', function($q) use ($request) {
                $q->where('id', $request->search_by_specialization);
            });
        }
    
        // Fetch results
        $members = $query->with(['user', 'centres', 'specializations'])->get();
    
        // Redirect to search results view with members data
        return view('patient.search', compact('members'));
    }

    // Appointments route
    public function ChannelDoctor()
    {
        return view('patient.channel');
    }

    // patient profile route
    public function PatientSettings()
    {
        return view('patient.settings.profile');
    }

}
