<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class MemberController extends Controller
{

    // Memebr dashboard route
    public function dashboard()
    {
        return view('member.dashboard');
    }

    public function MembersManagementAdd(Request $request)
    {
        $specializations = \App\Models\Specialization::all(); // Fetch all specializations
        return view('admin.users.members-add', compact('specializations'));
    }

    // Member regisration
    public function createMember(Request $request)
    {

        $validatedData = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'nic' => ['nullable', 'string', 'regex:/^(?:\d{9}[VX]|\d{12})$/'],
            'passport' => 'nullable|string',
            'nationality' => 'required|string',
            'phone' => 'nullable|string|max:13|min:10',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'medical_school' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
            'specializations' => 'required|array',
            'specializations.*' => 'exists:specializations,id',
            'password' => 'required|string|min:8|max:255|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).*$/',
        ]);
    
        $user = User::create([
            'name' => $validatedData['FirstName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        $nicOrPassport = $request->input('nationality') === 'Local' ? $validatedData['nic'] : $validatedData['passport'];
    
        $user->assignRole('member'); // Ensure you have roles set up correctly
    
        $member = new Member([
            'last_name' => $validatedData['LastName'],
            'nic' => $request->input('nationality') === 'Local' ? $nicOrPassport : null,
            'passport' => $request->input('nationality') !== 'Local' ? $nicOrPassport : null,
            'phone' => $validatedData['phone'],
            'dob' => $validatedData['dob'],
            'address' => $validatedData['address'],
            'medical_school' => $validatedData['medical_school'],
            'license_number' => $validatedData['license_number'],
            'nationality' => $validatedData['nationality'],
            'user_id' => $user->id,
        ]);
        $member->save();

        // Attach the specializations
        $member->specializations()->attach($validatedData['specializations']);
        
    
        // Determine if the registration is by admin
        if ($request->input('registered_by_admin') == 'yes') {
    
            return redirect()->route('MembersManagement');
        }
    }
}
