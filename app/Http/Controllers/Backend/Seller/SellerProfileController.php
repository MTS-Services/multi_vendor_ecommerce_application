<?php

namespace App\Http\Controllers\Backend\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerProfileRequest;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;

class SellerProfileController extends Controller
{
    public function show()
    {
        $seller = seller();
        return view('backend.seller.profile.index', compact('seller'));
    }

    public function update(SellerProfileRequest $request, Seller $seller)
    {
        $validated = $request->validated();

        // Update the seller details
        $seller->name = $validated['name'];
        $seller->email = $validated['email'];
        $seller->gender = $validated['gender'];  // Make sure this gets updated
        $seller->emergency_phone = $validated['emergency_phone'] ?? $seller->emergency_phone;
        $seller->phone = $validated['phone'];
        $seller->father_name = $validated['father_name'] ?? $seller->father_name;
        $seller->mother_name = $validated['mother_name'] ?? $seller->mother_name;
        $seller->present_address = $validated['present_address'] ?? $seller->present_address;
        $seller->permanent_address = $validated['permanent_address'] ?? $seller->permanent_address;

        // Check if the image is updated
        if ($request->hasFile('image')) {
            $seller->image = $request->file('image')->store('images/sellers', 'public');
        }
        $seller->save();

        return redirect()->route('seller.profile_show', $seller->id)
            ->with('success', 'Seller updated successfully');
    }
}
