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
            'gender' => 'required|in:' . implode(',', [
                Seller::GENDER_MALE,
                Seller::GENDER_FEMALE,
                Seller::GENDER_OTHERS,
            ]),
            'emergency_phone' => 'nullable|digits:11',
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
            'phone' => 'nullable|string|unique:sellers,phone|digits:11',
            'email' => 'required|unique:sellers,email',
            'password' => 'required|min:6|confirmed',
            'image' => 'required',
        ];
    }


    protected function update(): array
    {
        return [
            'username' => 'nullable|string|max:20|unique:sellers,username,' . seller()->id,
            'phone' => 'nullable|string|digits:11|unique:sellers,phone,' . seller()->id,
            'email' => 'required|unique:sellers,email,' . seller()->id,
            'password' => 'nullable|min:6|confirmed',
            'image' => 'nullable',
        ];
    }
}
