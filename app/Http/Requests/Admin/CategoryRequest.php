<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id = $this->route('category')?->id ?? null;

        return [
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $id],
            'slug' => ['nullable', 'string', 'max:255', 'unique:categories,slug,' . $id],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'], // max 2MB
            'status' => ['required', 'boolean'],
            'is_featured' => ['required', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Category name is required.',
            'name.unique' => 'This category name is already taken.',
            'slug.unique' => 'This slug is already in use.',
            'image.image' => 'Uploaded file must be a valid image.',
        ];
    }
}
