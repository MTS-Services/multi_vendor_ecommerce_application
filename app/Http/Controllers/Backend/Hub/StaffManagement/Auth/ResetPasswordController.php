<?php

namespace App\Http\Controllers\Backend\Hub\StaffManagement\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('frontend.auth.staff.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:staffs,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required',
        ]);

        $status = Password::broker('staffs')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($admin, $password) {
                $admin->password = Hash::make($password);
                $admin->save();
            }
        );
        session()->flash('success', __($status));
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('staff.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
