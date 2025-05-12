<?php

namespace App\Http\Controllers\Backend\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

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
        return route('admin.dashboard');
    }

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('frontend.auth.admin.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
