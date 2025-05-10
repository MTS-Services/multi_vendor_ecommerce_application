<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Country;
use Illuminate\Http\Request;

class AdminProfileContoller extends Controller
{
    public function profile()
    {
        // dd('here');
        // $data['address'] = Address::selfAddresses()->personal()->first();
        $data['address'] = Address::all()->first();
        $data['countries'] = Country::active()->select('id','name','slug')->orderBy('name')->get();
        return view('backend.admin.profile_management.profile', $data);
    }

    public function profile_update(AddressRequest $request)
    {
        
    }
}
