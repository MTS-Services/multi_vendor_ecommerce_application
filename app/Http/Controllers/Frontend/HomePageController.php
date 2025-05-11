<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function home()
    {
        $data['categories'] = Category::isMainCategory()->active()->featured()->orderBy('name', 'asc')->get();
        return view('frontend.pages.home', $data);
    }
}
