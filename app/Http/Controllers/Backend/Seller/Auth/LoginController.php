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
        return route("seller.profile");
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
            return redirect()->route('seller.profile');
        }
        return view('backend.seller.auth.login');
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
