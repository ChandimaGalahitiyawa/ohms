<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CentreController extends Controller
{
    // Center management route
    public function CentresManagement()
    {
        $centres = Centre::all();  // Fetch all centres from the database
        return view('admin.centres', compact('centres'));
    }

    // Add Center route
    public function CentresManagementAdd()
    {
        return view('admin.centres-add');
    }

    public function edit($id)
    {
        $centre = Centre::findOrFail($id);
        return view('admin.centres-edit', compact('centre'));
    }
    
    public function delete($id)
    {
        $centre = Centre::findOrFail($id);
        $centre->delete();
        return redirect()->route('CentresManagement')->with('success', 'Centre deleted successfully.');
    }

    // Create Centre route (post)
    public function createCentre(Request $request)
    {
        $request->validate([
            'centre_name' => 'required|string|max:255',
            'centre_contact_number' => 'required|string|min:10|max:13',
            'centre_email_address' => 'required|email|max:255',
            'centre_city' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'centre_fee_type' => 'required|in:flat_rate,percentage',
            'centre_accept_currency' => 'required|in:LKR,USD',
            'centre_fee' => 'required|numeric',
            'refund_protection_fee' => 'nullable|numeric'
        ]);

        $centre = Centre::create([
            'centre_name' => $request->centre_name,
            'centre_contact_number' => $request->centre_contact_number,
            'centre_email_address' => $request->centre_email_address,
            'centre_city' => $request->centre_city,
            'address' => $request->address,
            'centre_fee_type' => $request->centre_fee_type,
            'centre_accept_currency' => $request->centre_accept_currency,
            'centre_fee' => $request->centre_fee,
            'refund_protection_fee' => $request->refund_protection_fee
        ]);

        // Redirect to the list of centres with a success message
        return redirect()->route('CentresManagement')->with('success', 'Centre created successfully.');
    }


}
