<?php

namespace App\Http\Controllers\Backend\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerProfileRequest;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\FileManagementTrait;

class SellerProfileController extends Controller
{
    use FileManagementTrait;
    public function show()
    {
        $seller = seller();
        return view('backend.seller.profile.index', compact('seller'));
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
}
