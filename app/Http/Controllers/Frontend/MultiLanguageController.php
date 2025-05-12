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
            App::setLocale($lang);
            Session::put('locale', $lang);
            return response()->json(['success' => false, 'message' => 'Invalid language'], 400);
        }
         return response()->json(['success' => true, 'message' => 'Language switched successfully!']);
    }
}

