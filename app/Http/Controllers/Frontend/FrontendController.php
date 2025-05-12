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
    public function checkout()
    {
        return view('frontend.pages.checkout');
    }
    public function profile()
    {
        return view('frontend.pages.profile');
    }
    public function faq()
    {
        return view('frontend.pages.faq');
    }
    public function shop()
    {
        return view('frontend.pages.shop');
    }
    public function wishlist()
    {
        return view('frontend.pages.wishlist');
    }
    public function singel_product()
    {
        return view('frontend.pages.singel_product');
    }

    public function store_location()
    {
        return view('frontend.pages.store_location');
    }
}
