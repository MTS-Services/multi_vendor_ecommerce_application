<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MultiLanguageController extends Controller
{
    public function setLocale(Request $request)
    {
         $locale = $request->locale;

        if (!in_array($locale, ['en', 'bn'])) {
            return response()->json(['success' => false, 'message' => 'Invalid language'], 400);
        }
        session(['locale' => $locale]);
        App::setLocale($locale);

        return response()->json(['success' => true, 'message' => 'Language switched successfully!']);
    }
}
