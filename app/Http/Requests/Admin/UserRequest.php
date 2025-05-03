<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|min:4',

        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6|confirmed',
            'image' => 'nullable',
        ];
    }


    protected function update(): array
    {
        return [
            'email' => 'required|unique:users,email,' . decrypt($this->route('user')),
            'username' => 'required|unique:users,username,' . decrypt($this->route('user')),
            'password' => 'nullable|min:6|confirmed',
            'image' => 'nullable',
        ];
    }
}
