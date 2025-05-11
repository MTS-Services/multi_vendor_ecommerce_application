<?php

namespace App\Http\Requests\Admin\ProductManagement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductTagRequest extends FormRequest
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
             Rule::unique('product_tags')
                ->where(fn ($query) => $query->where('product_tags_id', $this->input('product_tags_id')))

        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'name' => 'required|string|min:3|unique:product_tags,name',
            'slug' => 'required|string|max:3|unique:product_tags,slug,',
            'description' => 'nullable|string',
            'value' => [
                Rule::unique('product_tags')
                    ->where(fn($query) => $query->where('product_tags_id', $this->input('product_tags_id')))
            ],
        ];
    }
    protected function update(): array
    {
        return [
            'name' => 'required|string|min:3|unique:product_tags,name' . decrypt($this->route('product_tags')),
            'slug' => 'required|unique:product_tags,slug' . decrypt($this->route('product_tags')),
            'value' => [
                Rule::unique('product_tags')
                    ->ignore(decrypt($this->route('product_tags')))
                    ->where(fn($query) => $query->where('product_tags_id', $this->input('product_tags_id')))
            ],
        ];
    }
}
