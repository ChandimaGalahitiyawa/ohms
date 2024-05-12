<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use Illuminate\Http\Request;
use App\Models\WeeklyAvailability;

class AvailabilityController extends Controller
{
    public function getUpdateAvailability($id){

        $availability = WeeklyAvailability::findOrFail($id);

        $centres = Centre::get();

        return view('member.updateAvailability', compact('availability', 'centres'));
    }


    public function updateWeeklyAvailability(Request $request, $id){

        $request->validate([
            'days' => 'required',
            'week_start_time' => 'required',
            'week_end_time' => 'required',
            'week_slots' => 'required',
            'centre_id' => 'required|exists:centres,id',
        ]);

        $availability = WeeklyAvailability::findOrFail($id);

        foreach ($request->days as $index => $day) {
            $availability->update([
                'center_id' => $request->centre_id, // Explicitly set the member_id
                'day' => $day,
                'start_time' => $request->week_start_time,
                'end_time' => $request->week_end_time,
                'slots' => $request->week_slots,
            ]);
        }

        return redirect()->route('MemberAvailability');

    }

    public function deleteAvailibilty($id){

        $availibilty = WeeklyAvailability::findOrFail($id);

        $availibilty->delete();

        return redirect()->back()->with('success', 'Availibilty deleted successfully');
    }
}
