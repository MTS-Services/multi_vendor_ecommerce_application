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

    public function singel_product()
    {
        return view('frontend.pages.singel_product');
    }
    
    public function store_location()
    {
        return view('frontend.pages.store_location');
    }
}
