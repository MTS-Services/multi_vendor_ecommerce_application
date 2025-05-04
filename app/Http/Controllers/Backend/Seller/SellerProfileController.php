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
        return view('backend.seller.profile.index', compact('seller'));
    }

    public function update(SellerProfileRequest $request, $sellerId)
    {
        $seller = Seller::findOrFail($sellerId);

        $validated = $request->validated();
        $seller->name = $validated['name'];
        $seller->email = $validated['email'];
        $seller->username = $validated['username'];
        if ($request->filled('password')) {
            $seller->password = Hash::make($validated['password']);
        }
        $seller->status = $validated['status'];
        $seller->is_verify = $validated['is_verify'];
        $seller->gender = $validated['gender'];
        $seller->email_verified_at = $validated['email_verified_at'] ?? $seller->email_verified_at;
        $seller->otp_send_at = $validated['otp_send_at'] ?? $seller->otp_send_at;
        $seller->emergency_phone = $validated['emergency_phone'] ?? $seller->emergency_phone;
        $seller->phone = $validated['phone'];
        $seller->father_name = $validated['father_name'] ?? $seller->father_name;
        $seller->mother_name = $validated['mother_name'] ?? $seller->mother_name;
        $seller->present_address = $validated['present_address'] ?? $seller->present_address;
        $seller->permanent_address = $validated['permanent_address'] ?? $seller->permanent_address;


        // Update model
        $seller->save();

        return redirect()->route('seller.profile_show', )
            ->with('success', 'Seller updated successfully');
    }
}
