<?php

namespace Laravel\Fortify\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Fortify;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = $request->user();

        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        }
        
        // Redirect based on user role
        if ($user->hasRole(['admin'])) {
            return redirect()->route('AdminDashboard');
        } elseif ($user->hasRole(['user'])) {
            return redirect()->route('UserDashboard');
        } elseif ($user->hasRole(['member'])) {
            return redirect()->route('MemberDashboard');
        } else {
            // Default redirect if no matching role is found
            return redirect()->intended(Fortify::redirects('login'));
        }        
    }
}



