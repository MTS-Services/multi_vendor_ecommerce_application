<?php

namespace App\Http\Controllers\Backend\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellerProfileRequest;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SellerProfileController extends Controller
{
    public function show()
    {
        $seller = Auth::guard('seller')->user();
        return view('backend.seller.profile.index',compact('seller'));
    }
    public function edit()
    {
        $seller = Auth::guard('seller')->user();
        return view('backend.seller.profile.edit',compact('seller'));
    }
    public function update(SellerProfileRequest $request, $sellerId)
{
    $seller = Seller::findOrFail($sellerId);

    // Handle password update
    if ($request->filled('password')) {
        $request->merge(['password' => Hash::make($request->password)]);
    } else {
        $request->request->remove('password');
    }

    // Handle image upload
    if ($request->hasFile('image')) {
        if ($seller->image) {
            Storage::disk('public')->delete($seller->image);
        }

        $filename = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
        $path = $request->image->storeAs('sellers', $filename, 'public');
        $request->merge(['image' => $path]);
    }

    // Update model
    $seller->update($request->except('_token', '_method'));

    return redirect()->route('sellers.profile_show', $seller->id)
        ->with('success', 'Seller updated successfully');
}
}

