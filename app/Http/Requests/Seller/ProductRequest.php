<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'seller_id' => 'required|exists:sellers,id',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'tax_class_id' => 'required|exists:tax_classes,id',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'sku' => 'required|string|min:3|unique:products,sku',
            'slug' => 'required|string|min:3|unique:products,slug',
        ];
    }

    protected function update(): array
    {
        $productId = decrypt($this->route('product'));

         return [
            'sku' => 'required|string|unique:products,sku,' . decrypt($this->route('product')),
            'slug' => 'required|string|unique:products,slug,' . decrypt($this->route('product')),
          
        ];
    }
}