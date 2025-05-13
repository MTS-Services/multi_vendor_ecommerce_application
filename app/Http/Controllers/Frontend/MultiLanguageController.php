<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class MultiLanguageController extends Controller
{
    public function change($lang)
    {
        if (in_array($lang, ['en', 'bn'])) {
            Session::put('locale', $lang);
            Session::save(); 
            App::setLocale($lang);
            return redirect()->back();
        }
         return redirect()->back()->with('error', 'Invalid Language');
    } 
}

