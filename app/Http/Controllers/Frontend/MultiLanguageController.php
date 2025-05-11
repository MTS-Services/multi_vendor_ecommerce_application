<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MultiLanguageController extends Controller
{
    public function langSwitch(Request $request)
    {
        $lang = $request->lang;
        if (in_array($lang, ['en', 'bn'])) {
            App::setLocale($request->lang);
            session()->put('language', $lang);
        }
        return redirect()->back();
    }
}
