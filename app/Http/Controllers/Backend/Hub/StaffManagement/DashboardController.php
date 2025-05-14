<?php

namespace App\Http\Controllers\Backend\Hub\StaffManagement;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
    }
    public function dashboard(): View
    {
        return view('backend.hub.dashboard');
    }
}
