<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function t()
    {
        return view('frontend.auth.user.confirm-password');
    }
}
