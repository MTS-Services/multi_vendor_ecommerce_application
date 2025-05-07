<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // User/Customer Auths

    public function userLogin()
    {
        return view('frontend.auth.user.login');
    }

    public function userRegister()
    {
        return view('frontend.auth.user.register');
    }

    public function verifyEmail()
    {
        return view('frontend.auth.user.verify');
    }
}
