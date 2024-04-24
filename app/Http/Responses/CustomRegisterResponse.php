<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Laravel\Fortify\Fortify; 

class CustomRegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user(); // Retrieve the user from the request

        // Check the user's role and redirect accordingly
        if ($user->hasRole('patient')) { // Check if user role is 'user'
            return redirect('/patient/dashboard');
        }

        // Default redirect
        return redirect('/home');
    }
}