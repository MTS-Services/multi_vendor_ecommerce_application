<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalInformationRequest extends FormRequest
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
            'profile_id' => 'required|exists:profiles,id',
            'profile_type' => 'required|string',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,others',
            'emergency_phone' => 'nullable|digits:11',
            'father_name' => 'nullable|string|min:3',
            'mother_name' => 'nullable|string|min:3',
            'nationality' => 'nullable|string|min:3',
            'bio' => 'nullable|string|min:3',
        ];
    }
}
