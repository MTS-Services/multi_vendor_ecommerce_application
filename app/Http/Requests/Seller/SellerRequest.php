<?php

namespace App\Http\Requests\Seller;

use App\Models\Seller;
use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'gender' => 'required|in:' . implode(',', [
                Seller::GENDER_MALE,
                Seller::GENDER_FEMALE,
                Seller::GENDER_OTHERS,
            ]),

            ]
            +
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
            'username' => 'nullable|string|unique:sellers,username|max:20,'. decrypt($this->route('seller')),
            'email' => 'required|unique:sellers,email,' . decrypt($this->route('seller')),
            'password' => 'nullable|min:6|confirmed',
            'image' => 'nullable',
        ];
    }
}
