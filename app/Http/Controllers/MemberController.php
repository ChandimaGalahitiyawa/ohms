<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Centre;
use App\Models\Member;
use App\Models\DoctorNote;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\WeeklyAvailability;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\SpecificAvailability;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class MemberController extends Controller
{

    // Memebr dashboard route
    public function dashboard()
    {
        $user = Auth::user();
        $member = $user->member;
        
        // Assuming Colombo timezone for conversion
        $today = Carbon::now('Asia/Colombo')->toDateString();

        $todayAppointments = Appointment::where('member_id', $member->id)
            ->whereDate('appointment_date', $today)
            ->get();

        return view('member.dashboard', compact('todayAppointments'));
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

    // Specializations
    public function MemberSpecializations()
    {

        $user = Auth::user();

        $member = $user->member;

        $specializations = $member->specializations;
        
        return view('member.specializations', compact('specializations'));
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

        $user = Auth::user();

        $member = $user->member;

        $availabilities = $member->weeklyAvailabilities;

        $centres = Centre::all();

        return view('member.availability', compact('availabilities', 'centres'));
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

    public function detachSpecialization(Request $request, $id)
    {

        $user = Auth::user();

        $member = $user->member;

        $member->specializations()->detach($id);

        return redirect()->back()->with('success', 'specilization detached successfully');
    }


    public function fetchAppointmentCountsForCalendar()
    {
        $user = Auth::user();
        $member = $user->member;
        
        // Fetch appointment counts grouped by date
        $appointmentCounts = Appointment::where('member_id', $member->id)
            ->selectRaw('DATE(appointment_date) as appointment_date, COUNT(*) as appointment_count')
            ->groupBy('appointment_date')
            ->get();
    
        return response()->json($appointmentCounts);
    }


    public function memberAppointments(){

        $user = Auth::user();

        $member = $user->member;

        $bookings = Appointment::where('member_id', $member->id)->latest()->get();

        return view('member.appointments', compact('bookings'));
    }

    public function finishAppointment($id){

        $booking = Appointment::findOrFail($id);


        return view('member.finishAppointment', compact('booking'));
    }


    public function storeDoctorNotes(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'description' => 'required|string',
            'webcam_capture_file' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
        ]);

        // Find the appointment associated with the given ID
        $appointment = Appointment::findOrFail($id);

        if($appointment->doctorNote){
            $doctorNote = $appointment->doctorNote;
        }else{
            $doctorNote = new DoctorNote();
        }

        $doctorNote->appointment_id = $appointment->id;
        $doctorNote->description = $request->input('description');

        // Check if there's a file uploaded
        if ($request->hasFile('webcam_capture_file')) {
            // Handle file upload
            $file = $request->file('webcam_capture_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('doctor_notes', $fileName, 'public');
            $doctorNote->file_path = $filePath;
        }

        // Save the doctor note
        $doctorNote->save();

        $appointment->status = 'completed';

        $appointment->save();

        // Optionally, you can redirect the user back with a success message
        return redirect()->route('viewAppointment', $appointment->id)->with('success', 'Doctor note added successfully!');
    }
    
}

// dd($request->all()); // This will stop execution after the first loop iteration!