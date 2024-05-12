<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Fortify;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        }

        if ($user->hasRole(['admin'])) {
            return redirect()->route('AdminDashboard');
        } elseif ($user->hasRole(['patient'])) {
            return redirect()->route('PatientDashboard');
        } elseif ($user->hasRole(['member'])) {
            return redirect()->route('MemberDashboard');
        } else {
            return redirect()->intended(Fortify::redirects('login'));
        }
    }
}
