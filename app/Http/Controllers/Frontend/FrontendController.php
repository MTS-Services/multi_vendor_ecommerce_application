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
    public function shop()
    {
        return view('frontend.pages.shop');
    }
    public function wishlist()
    {
        return view('frontend.pages.wishlist');
    }
    public function cart()
    {
        return view('frontend.pages.cart');
    }
}
