<?php

namespace App\Http\Requests\Seller;

use App\Models\Seller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SellerProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:sellers,email,' . seller()->id,
            'username' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status' => 'required|in:active,inactive',
            'is_verify' => 'required|boolean',
            'gender' => 'required|in:male,female',
            'email_verified_at' => 'nullable|date',
            'otp_send_at' => 'nullable|date',
            'emergency_phone' => 'nullable|digits:11',
            'phone' => 'required|digits:11',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'present_address' => 'nullable|string|max:500',
            'permanent_address' => 'nullable|string|max:500',

        ];
    }

}
