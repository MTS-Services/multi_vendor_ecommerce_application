<?php

namespace App\Http\Controllers\Backend\Seller\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected function redirectTo()
    {
        return route('user.profile');
    }

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('frontend.auth.user.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

     public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:sellers,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required',
        ]);

        $status = Password::broker('sellers')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($admin, $password) {
                $admin->password = Hash::make($password);
                $admin->save();
            }
        );
        session()->flash('success', __($status));
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('seller.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
