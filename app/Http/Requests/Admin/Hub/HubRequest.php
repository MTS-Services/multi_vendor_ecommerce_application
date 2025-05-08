<?php

namespace App\Http\Requests\Admin\Hub;

use Illuminate\Foundation\Http\FormRequest;

class HubRequest extends FormRequest
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
            'name'=> 'required|string',
            'description' => 'nullable|string',
            'country' => 'required|exists:countries,id',
            'state' => 'nullable|exists:states,id',
            'city' => 'nullable|exists:cities,id',
            'operation_area' => 'nullable|exists:operation_areas,id',

        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'slug' => 'required|unique:hubs,slug',
        ];
    }


    protected function update(): array
    {
        return [
            'slug' => 'required|unique:hubs,slug,' . decrypt($this->route('hub')),
        ];
    }
}
