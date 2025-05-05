<?php

namespace App\Http\Controllers\Backend\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerProfileRequest;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\FileManagementTrait;
use Illuminate\Http\Request;

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
    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required'],
        'new_password' => ['required', 'min:8', 'confirmed'], // will match new_password_confirmation
    ]);

    $seller = seller(); // or just Auth::user() if you're not using custom guard

    if (!Hash::check($request->current_password, $seller->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect']);
    }

    $seller->password = Hash::make($request->new_password);
    $seller->save();

    return back()->with('success', 'Password changed successfully!');
}
}
