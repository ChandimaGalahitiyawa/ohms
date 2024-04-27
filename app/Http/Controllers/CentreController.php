<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CentreController extends Controller
{
    // Center management route
    public function MembersManagement()
    {
        return view('admin.centres');
    }

    // Add Center route
    public function CentresManagementAdd()
    {
        return view('admin.centre-add');
    }

    // Create Center route (post)
    public function createCentre()
    {
        return view('admin.centres');
    }
}
