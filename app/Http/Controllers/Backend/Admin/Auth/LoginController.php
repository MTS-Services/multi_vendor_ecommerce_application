<?php

namespace App\Http\Controllers\Backend\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected function redirectTo()
    {
        return route("admin.dashboard");
    }


    public function __construct()
    {
        $this->middleware('auth:admin')->only('logout');
    }

    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        if ($this->guard()->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('backend.admin.auth.login');
    }

    /**
     * Guard for admin authentication.
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Log the admin out and redirect to login page.
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->route('admin.login');
    }
}
