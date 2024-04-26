<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AvailabilityController extends Controller
{
    /**
     * Create or update the availability for a member.
     */
    public function createOrUpdateAvailability(Request $request, $memberId)
    {
        $request->validate([
            'pattern_type' => 'required|string|in:daily,weekly,monthly,custom',
            'pattern' => 'required|array',
            'all_day' => 'required|boolean',
            'time_slots' => 'array',
            'time_slots.*.start' => 'required_with:time_slots|date_format:H:i',
            'time_slots.*.end' => 'required_with:time_slots|date_format:H:i',
            'status' => 'required|boolean',
        ]);

        $member = Member::findOrFail($memberId);

        $availability = $member->availabilities()->create([
            'pattern_type' => $request->pattern_type,
            'pattern' => $request->pattern,
            'all_day' => $request->all_day,
            'time_slots' => $request->all_day ? null : $request->time_slots,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Availability updated successfully.');
    }

    /**
     * Display the form for editing a member's availability.
     */
    public function editAvailability($memberId)
    {
        $member = Member::with('availabilities')->findOrFail($memberId);

        // Assuming you have a view called 'members.edit-availability' to edit the availability.
        return view('members.edit-availability', compact('member'));
    }
}
