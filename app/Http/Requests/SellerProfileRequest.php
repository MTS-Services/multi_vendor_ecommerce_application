<?php

namespace App\Http\Requests;

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
        $sellerId = $this->route('seller'); // Get ID from route

        return [
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($sellerId),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($sellerId),
            ],
            'phone' => 'nullable|string|max:20',
            'emargency_phone' => 'nullable|string|max:20',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'present_address' => 'nullable|string|max:255',
            'permanent_address' => 'nullable|string|max:255',
            'gender' => 'nullable|integer|in:1,2,3',
            'status' => 'nullable|boolean',
            'is_verify' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:8',
        ];
    }

}
