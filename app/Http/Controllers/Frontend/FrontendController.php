<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.pages.home');
    }

    public function test()
    
    {
        return view('frontend.pages.test');
    }

    public function index()
    {
        return view('frontend.auth.user.register');
    }
    public function forgotpassword()
    {
        return view('frontend.auth.user.forgot');
    }
    public function resetpassword()
    {

        return view('frontend.auth.user.reset');
    }
    public function verifypassword()
    {
        return view('frontend.auth.user.verify');
    }

    //seller
    public function registerseller()
    {
        return view('frontend.auth.seller.register');
    }
    public function sellerlogin()
    {
        return view('frontend.auth.seller.login');
    }
    public function sellerrest()
    {
        return view('frontend.auth.seller.reset');
    }
    public function sellerverify()
    {
        return view('frontend.auth.seller.verify');
    }

    public function sellerforgot()
    {
        return view('frontend.auth.seller.forgot');
    }

    //admin


    public function adminlogin()
    {
        return view('frontend.auth.admin.login');
    }
    public function adminrest()
    {
        return view('frontend.auth.admin.reset');
    }
    public function adminverify()
    {
        return view('frontend.auth.admin.verify');
    }

    public function adminforgot()
    {
        return view('frontend.auth.admin.forgot');
    }
}
