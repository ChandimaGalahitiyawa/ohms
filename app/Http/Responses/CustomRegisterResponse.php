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
        if ($user->hasRole('user')) { // Make sure you have a role mechanism like spatie/laravel-permission
            return redirect('/user/dashboard');
        }

        // Default redirect
        return redirect('/home');
    }
}