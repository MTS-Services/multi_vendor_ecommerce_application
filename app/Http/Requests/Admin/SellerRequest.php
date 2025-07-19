<?php

namespace App\Http\Requests\Admin;

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
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'country' => 'required|exists:countries,id',
            'state' => 'nullable|exists:states,id',
            'city' => 'required|exists:cities,id',
            'operation_area' => 'nullable|exists:operation_areas,id',
            'operation_sub_area'=> 'nullable|exists:operation_sub_areas,id',
            'hub' => 'required|exists:hubs,id',
            ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'email' => 'required|unique:sellers,email',
            'password' => 'required|min:6|confirmed',
        ];
    }


    protected function update(): array
    {
        return [
            'email' => 'required|unique:sellers,email,' . decrypt($this->route('seller')),
            'password' => 'nullable|min:6|confirmed',
        ];
    }
}
