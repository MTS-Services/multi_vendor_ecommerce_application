<?php

namespace App\Http\Controllers\Backend\Hub\StaffManagement\Auth;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest:staff');
    }

    public function showRegistrationForm()
    {
        if (Auth::guard('staff')->check()) {
            return redirect()->route('staff.dashboard');
        }
        return view('frontend.auth.staff.register');
    }

    protected function guard()
    {
        return Auth::guard('staff');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Staff::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $valideted = $this->validator($request->all())->validate();
        $staff = $this->create($valideted);
        $this->guard()->login($staff);
        return redirect()->route('staff.dashboard');
    }
}
