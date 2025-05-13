<?php

namespace App\Http\Requests\Admin\Setup;

use Illuminate\Foundation\Http\FormRequest;

class LatestOfferRequest extends FormRequest
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
            'sort_order'   => 'nullable|integer',
            'title'        => 'required|string|max:255',
            'url'          => 'required|url',
            'description'  => 'nullable|string',
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
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

