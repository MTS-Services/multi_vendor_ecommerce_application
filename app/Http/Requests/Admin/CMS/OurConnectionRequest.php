<?php

namespace App\Http\Requests\Admin\CMS;

use Illuminate\Foundation\Http\FormRequest;

class OurConnectionRequest extends FormRequest
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
            'website' => 'required|url',
            'description' => 'nullable|string',
        ]+ ($this->isMethod('POST') ? $this->store() : $this->update());
    }


 protected function store(): array
    {
        return [
            'image' => 'required',
        ];
    }

    protected function update(): array
    {
        return [
            'image' => 'nullable',
        ];
    }
}

