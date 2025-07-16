<?php

namespace App\Http\Requests\Admin\Hub;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
        'hub_id' => ['required', 'exists:hubs,id'],
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'username' => 'nullable|string|max:255',
        'phone' => 'required|numeric',
        'email' => 'required|email|unique:staffs,email',
        'password' => 'required|confirmed|min:6',
        'image' => 'nullable',
        ];
    }
}
