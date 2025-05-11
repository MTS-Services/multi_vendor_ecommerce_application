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
            'name' => 'required|string|min:3',
            'slug' => 'required|string|min:3',
        ];
    }
    protected function store(): array
    {
        return [
            'value' => [
                Rule::unique('product_tags')
                    ->where(fn($query) => $query->where('product_tags_id', $this->input('product_tags_id')))
            ],
        ];
    }
    protected function update(): array
    {
        return [
            'value' => [
                Rule::unique('product_tags')
                    ->ignore(decrypt($this->route('product_tags')))
                    ->where(fn($query) => $query->where('product_tags_id', $this->input('product_tags_id')))
            ],
        ];
    }
}
