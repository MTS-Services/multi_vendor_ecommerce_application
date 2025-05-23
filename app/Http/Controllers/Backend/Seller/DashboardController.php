<?php

namespace App\Http\Controllers\Backend\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function dashboard()
    {
        return view('backend.seller.dashboard');
    }
}
