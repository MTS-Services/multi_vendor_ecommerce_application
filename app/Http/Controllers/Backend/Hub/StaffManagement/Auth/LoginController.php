<?php

namespace App\Http\Controllers\Backend\Hub\StaffManagement\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected function redirectTo()
    {
        return route("staff.dashboard");
    }


    public function __construct()
    {
        $this->middleware('auth:staff')->only('logout');
    }

    /**
     * Show the admin login form.
     */

    public function showLoginForm()
    {
        if ($this->guard()->check()) {
            return redirect()->route('staff.dashboard');
        }
        return view('frontend.auth.staff.login');
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
        $login = $request->input('login');
        $isEmail = filter_var($login, FILTER_VALIDATE_EMAIL);

        $rules = [
            'login' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($isEmail) {
                    $field = $isEmail ? 'email' : 'username';
                    if (!\App\Models\Staff::where($field, $value)->exists()) {
                        $fail("The selected {$attribute} is invalid.");
                    }
                },
            ],
            'password' => ['required', 'string'],
        ];

        $request->validate($rules);
    }


    /**
     * Guard for admin authentication.
     */
    protected function guard()
    {
        return Auth::guard('staff');
    }

    /**
     * Log the admin out and redirect to login page.
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->route('staff.login');
    }
}
