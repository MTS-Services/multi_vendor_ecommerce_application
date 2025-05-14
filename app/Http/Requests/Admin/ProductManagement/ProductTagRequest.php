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
            'description' => 'nullable|string',
            //  Rule::unique('product_tags')
            //     ->where(fn ($query) => $query->where('product_tags_id', $this->input('product_tags_id')))

        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'name' => 'required|string|min:3|unique:product_tags,name',
            'slug' => 'required|string|min:3|unique:product_tags,slug,',
            // 'value' => [
            //     Rule::unique('product_tags')
            //         ->where(fn($query) => $query->where('product_tags_id', $this->input('product_tags_id')))
            // ],
        ];
    }
    protected function update(): array
    {
        return [
            'name' => 'required|string|unique:product_tags,name,' . decrypt($this->route('product_tag')),
            'slug' => 'required|string|unique:product_tags,slug,' . decrypt($this->route('product_tag')),
            // 'value' => [
            //     Rule::unique('product_tags')
            //         ->ignore(decrypt($this->route('product_tags')))
            //         ->where(fn($query) => $query->where('product_tags_id', $this->input('product_tags_id')))
            // ],
        ];
    }
}
