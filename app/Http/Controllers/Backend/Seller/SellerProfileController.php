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
        $seller->name = $validated['name'];
        if ($validated['email'] !== $seller->email) {
            if (Seller::where('email', $validated['email'])->where('id', '!=', $seller->id)->exists()) {
                return redirect()->back()->withErrors(['email' => 'The email has already been taken by another seller.']);
            }
            $seller->email = $validated['email'];
        } else {
            $validated['email'] = $seller->email;
        }




        $seller->username = $validated['username'];
        $seller->status;
        if ($request->filled('password')) {
            $seller->password = Hash::make($validated['password']);
        }
        $seller->is_verify;
        $seller->gender;
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
