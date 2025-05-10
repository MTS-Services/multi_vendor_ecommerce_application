<?php

namespace App\Http\Controllers\Backend\Seller\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected function redirectTo()
    {
        return route("seller.dashboard");
    }


    public function __construct()
    {
        $this->middleware('auth:seller')->only('logout');
    }

    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        if ($this->guard()->check()) {
            return redirect()->route('seller.dashboard');
        }
        return view('frontend.auth.seller.login');
    }

    public function username()
    {
        return 'login';
    }

    protected function credentials(Request $request)
    {
        $login = $request->input('login');

        // Detect if input is an email or username
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return [
            $field => $login,
            'password' => $request->input('password'),
        ];
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Guard for admin authentication.
     */
    protected function guard()
    {
        return Auth::guard('seller');
    }

    /**
     * Log the admin out and redirect to login page.
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->route('seller.login');
    }
}
