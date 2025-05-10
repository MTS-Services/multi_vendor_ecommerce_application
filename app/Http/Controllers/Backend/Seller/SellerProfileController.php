<?php

namespace App\Http\Controllers\Backend\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\Seller\SellerProfileRequest;
use App\Models\Seller;
use App\Http\Traits\FileManagementTrait;
use App\Models\Address;
use App\Models\Country;

class SellerProfileController extends Controller
{
    use FileManagementTrait;
    public function show()
    {
        $data['seller'] = Seller::all()->findOrFail(seller()->id);
        $data['address'] = Address::selfAddresses()->personal()->first();
        $data['countries'] = Country::active()->select('id','name','slug')->orderBy('name')->get();
        return view('backend.seller.profile_management.profile', $data);
    }

    public function update(SellerProfileRequest $request)
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
        $validated['updater_id'] = seller()->id;
        $validated['updater_type'] = get_class(seller());
        $address = Address::selfAddresses()->personal()->first();
        $address->update($validated);
        session()->flash('success', 'Address updated successfully.');
        return redirect()->back();
    }
}
