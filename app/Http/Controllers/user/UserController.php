<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // user dashboard route
    public function dashboard()
    {
        return view('user.dashboard');}
}
