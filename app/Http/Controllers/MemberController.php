<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Centre;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\WeeklyAvailability;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\SpecificAvailability;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class MemberController extends Controller
{

    // Memebr dashboard route
    public function dashboard()
    {
        return view('member.dashboard');
    }

    // Member profile route
    public function MemberSettings()
    {
        return view('member.settings');
    }

    // Member regisration

    public function MembersManagementAdd(Request $request)
    {
        return view('admin.users.members-add');
        
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
            'password' => 'required|string|min:8|max:255|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).*$/',
        ]);
        
        $user = User::create([
            'name' => $validatedData['FirstName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        $nicOrPassport = $request->input('nationality') === 'Local' ? $validatedData['nic'] : $validatedData['passport'];
    
        $user->assignRole('member'); 
    
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
        
        // dd($request->all());
        // Determine if the registration is by admin
        if ($request->input('registered_by_admin') == 'yes') {
    
            return redirect()->route('MembersManagement');
        }
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

    $user->update([
        'name' => $validatedData['FirstName'],
        'email' => $validatedData['email'],
    ]);

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

    // Redirect to a route, e.g., member management view
    if ($request->input('updated_by_admin') == 'yes') {
        return redirect()->route('MembersManagement');
    } else {
        // Return to a member profile page or a similar route
        return redirect()->route('MemberProfile', ['id' => $member->id]);
    }
}

    // Specializations
    public function MemberSpecializations()
    {
        return view('member.specializations');
    }
    // add Specializations
    public function MemberSpecializationsAdd()
    {
        $specializations = \App\Models\Specialization::all(); // Fetch all specializations
        return view('member.specializations-add', compact('specializations'));
    }

    // add specializations (post method)
    public function createSpecialization(Request $request)
    {
        $request->validate([
            'specializations' => 'required|array',
            'specializations.*.id' => 'required|exists:specializations,id',
            'specializations.*.fee' => 'required|numeric|min:0',
        ]);

        $member = auth()->user()->member;
        if (!$member) {
            return back()->with('error', 'No member profile found for the user.');
        }

        foreach ($request->specializations as $specialization) {
            $member->specializations()->syncWithoutDetaching([
                $specialization['id'] => ['fee' => $specialization['fee']]
            ]);
        }

        return redirect()->route('MemberSpecializations')->with('success', 'Specializations updated successfully.');

        // dd($request->all());
    }

    // Availability
    public function MemberAvailability()
    {
        return view('member.availability');
    }

    public function MemberAvailabilityAdd()
    {
        $centres = Centre::all(); // Fetch all centres
        return view('member.availability-add', compact('centres')); 
    }

    // add availability
    public function createWeeklyAvailability(Request $request)
    {
        $request->validate([
            'days' => 'required|array',
            'days.*' => 'required|string',
            'week_start_time' => 'required|array',
            'week_start_time.*' => 'required|date_format:H:i',
            'week_end_time' => 'required|array',
            'week_end_time.*' => 'required|date_format:H:i',
            'week_slots' => 'required|array',
            'week_slots.*' => 'required|integer',
            'centre_id' => 'required|exists:centres,id',
        ]);

        $user = auth()->user();
        $member = $user->member;

        $center = Centre::findOrFail($request->centre_id); 
        
        if (!$member) {
            return back()->with('error', 'No member profile found for the user.');
        }
        
        foreach ($request->days as $index => $day) {
            $availability = $member->weeklyAvailabilities()->create([
                'member_id' => $member->id,
                'center_id' => $request->centre_id, // Explicitly set the member_id
                'day' => $day,
                'start_time' => $request->week_start_time[$index],
                'end_time' => $request->week_end_time[$index],
                'slots' => $request->week_slots[$index],
            ]);
        }

        return redirect()->route('MemberAvailability');
    }
    
    // add availability for specific dates
    public function createSpecificAvailability(Request $request)
    {
        $request->validate([
            'specific_dates' => 'required|array',
            'specific_dates.*' => 'required|date',
            'specific_start_times' => 'required|array',
            'specific_start_times.*' => 'required|date_format:H:i',
            'specific_end_times' => 'required|array',
            'specific_end_times.*' => 'required|date_format:H:i',
            'specific_slots' => 'required|array',
            'specific_slots.*' => 'required|integer',
            'centre_id' => 'required|exists:centres,id', // Validate centre_id
        ]);

        $member = auth()->user()->member;
        if (!$member) {
            return back()->with('error', 'No member profile found for the user.');
        }
    
        foreach ($request->specific_dates as $index => $date) {
            $specificAvailability = $member->specificAvailabilities()->create([
                'date' => $date,
                'start_time' => $request->specific_start_times[$index],
                'end_time' => $request->specific_end_times[$index],
                'slots' => $request->specific_slots[$index],
            ]);

            // Associate specific availability with the centre
            $specificAvailability->centres()->attach($request->centre_id, [
                'member_id' => $member->id,
                'created_at' => now(),  // Manually setting the timestamp
                'updated_at' => now()   // Manually setting the timestamp
            ]);
        }
    
        return redirect()->route('MemberAvailability');
    }
    
}

// dd($request->all()); // This will stop execution after the first loop iteration!