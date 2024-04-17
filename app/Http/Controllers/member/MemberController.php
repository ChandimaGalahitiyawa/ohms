<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // memebr dashboard route
    public function dashboard()
    {
        return view('member.dashboard');}
}
