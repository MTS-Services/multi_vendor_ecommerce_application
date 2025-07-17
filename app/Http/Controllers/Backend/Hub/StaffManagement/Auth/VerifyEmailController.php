<?php

namespace App\Http\Controllers\Backend\Hub\StaffManagement\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hub\Auth\StaffEmailVerificationRequest;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Handle the incoming staff email verification request.
     *
     * @param  \App\Http\Requests\Auth\StaffEmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(StaffEmailVerificationRequest $request): RedirectResponse
    {
        $staff = $request->user('staff'); // Explicitly use 'staff' guard

        if (! $staff) {
            abort(403, 'Staff Unauthorized action.');
        }

        if ($staff->hasVerifiedEmail()) {
            return redirect()->route('staff.dashboard')->with('verified', true);
        }

        if ($staff->markEmailAsVerified()) {
            event(new Verified($staff));
        }

        return redirect()->route('staff.dashboard')->with('verified', true);
    }
}


