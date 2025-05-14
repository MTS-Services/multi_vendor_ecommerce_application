<?php

namespace App\Http\Controllers\Backend\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\Seller\PasswordUpdateRequest;
use App\Http\Requests\Seller\SellerProfileRequest;
use App\Models\Seller;
use App\Http\Traits\FileManagementTrait;
use App\Models\Address;
use App\Models\Country;
use GuzzleHttp\Psr7\Request;

class SellerProfileController extends Controller
{
    use FileManagementTrait;
    public function show()
    {
        $data['seller'] = Seller::with('personalInformation')->findOrFail(seller()->id);
        $data['address'] = Address::personal()->sellerAddresses()->first();
        $data['countries'] = Country::active()->select('id','name','slug')->orderBy('name')->get();
        return view('backend.seller.profile_management.profile', $data);
    }

    public function profileUpdate(Request $request)
    {
    }
    
    public function addressUpdate(AddressRequest $request)
    {
         $validated = $request->validated();
        $validated['country_id'] = $request->country_id;
        $validated['state_id'] = $request->state;
        $validated['city_id'] = $request->city_id;
        $validated['operation_area_id'] = $request->operation_area;
        $validated['operation_sub_area_id'] = $request->operation_sub_area;
        $validated['updater_id'] = seller()->id;
        $validated['updater_type'] = get_class(seller());
        $validated['profile_id'] = seller()->id;
        $validated['profile_type'] = get_class(seller());

        $validated['type'] = Address::TYPE_PERSONAL;
        $address = Address::personal()->sellerAddresses()->first();
        if(!$address) {
            Address::create($validated);
        }
        else {
            $address->update($validated);
        }
        session()->flash('success', 'Address updated successfully.');
        return redirect()->back();
    }

    //password update
    public function passwordUpdate(PasswordUpdateRequest $request)
    {
        $seller = Seller::findOrFail(seller()->id);
        $validated = $request->validated();
        $seller->update($validated);
        session()->flash('success', 'Password updated successfully.');
        return redirect()->back();
    }
}
