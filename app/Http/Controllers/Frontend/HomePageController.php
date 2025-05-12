<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;

class HomePageController extends Controller
{
    public function home()
    {
        $data['categories'] = Category::isMainCategory()->active()->featured()->orderBy('name', 'asc')->get();
        $data['banners'] = Banner::active()->orderBy('title', 'asc')->get();
        return view('frontend.pages.home', $data);
    }
}
