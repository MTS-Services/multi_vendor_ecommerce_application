<?php

namespace App\Http\Controllers\Backend\Hub\StaffManagement\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
      public function showLinkRequestForm()
    {
        return view('frontend.auth.staff.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:staffs,email',
        ]);

        $status = Password::broker('staffs')->sendResetLink(
            $request->only('email')
        );
        session()->flash('success', __($status));

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
