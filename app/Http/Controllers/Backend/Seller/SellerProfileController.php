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
        $data['seller'] = Seller::findOrFail(seller()->id);
        $data['address'] = Address::personal()->sellerAddresses()->first();
        $data['countries'] = Country::active()->select('id','name','slug')->orderBy('name')->get();
        return view('backend.seller.profile_management.profile', $data);
    }

    public function profileUpdate(SellerProfileRequest $request)
    {
        $validated = $request->validated();

        // Update the seller details
        $validated['updater_id'] = seller()->id;
        $validated['updater_type'] = get_class(seller());


        $seller = Seller::findOrFail(seller()->id);
        if (isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload($seller, $request->image, seller(), 'sellers/');
        }
        $seller->update($validated);

        session()->flash('success', 'Profile updated successfully.');
        return redirect()->back();
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
        $validated['updater_id'] = seller()->id;
        $validated['updater_type'] = get_class(seller());
        $address = Address::personal()->sellerAddresses()->first();
        $address->update($validated);
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
