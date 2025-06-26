<?php

namespace App\Http\Requests\Hub\StaffManagement;

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
            'first_name' => 'required|string|min:4',
            'last_name' => 'required|string|min:4',
            'hub_id' => 'required|exists:hubs,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'email' => 'required|unique:staffs,email',
            'password' => 'required|min:6|confirmed',
            'username' => [
                'nullable',
                'unique:staffs,username',
                'regex:/^[a-zA-Z0-9\-]+$/',
            ],
        ];
    }


    protected function update(): array
    {
        return [
            'email' => 'required|unique:staffs,email,' . decrypt($this->route('staff')),
            'password' => 'nullable|min:6|confirmed',
            'username' => [
                'nullable',
                'unique:staffs,username,' . decrypt($this->route('staff')),
                'regex:/^[a-zA-Z0-9\-]+$/',
            ],
        ];
    }
}
