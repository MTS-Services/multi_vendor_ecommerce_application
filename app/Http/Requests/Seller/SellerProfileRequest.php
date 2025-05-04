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
            'email' => 'required|email|unique:sellers,email,',
            'username' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gender' => 'required|in:' . implode(',', [
                Seller::GENDER_MALE,
                Seller::GENDER_FEMALE,
                Seller::GENDER_OTHERS,
            ]),
            'emergency_phone' => 'nullable|digits:11',
            'phone' => 'required|digits:11',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'present_address' => 'nullable|string|max:500',
            'permanent_address' => 'nullable|string|max:500',

        ] +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'username' => 'nullable|string|unique:sellers,username|max:20',
            'email' => 'required|unique:sellers,email',
            'password' => 'required|min:6|confirmed',
            'image' => 'required',
        ];
    }


    protected function update(): array
    {
        return [
            'username' => 'nullable|string|unique:sellers,username|max:20,' . ($this->route('seller')),
            'email' => 'required|unique:sellers,email,' . ($this->route('seller')),
            'password' => 'nullable|min:6|confirmed',
            'image' => 'nullable',
        ];
    }
}
