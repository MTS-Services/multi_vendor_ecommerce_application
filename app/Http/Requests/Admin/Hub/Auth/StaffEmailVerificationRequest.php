<?php

namespace App\Http\Requests\Admin\Hub\Auth;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StaffEmailVerificationRequest extends FormRequest
{
    /**
     * Determine if the staff user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $staff = $this->staff();
        return $staff &&
        hash_equals((string) $this->route('id'), (string) $staff->getKey()) &&
        hash_equals((string) $this->route('hash'), sha1($staff->getEmailForVerification()));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Fulfill the email verification request.
     *
     * @return void
     */
    public function fulfill()
    {
        $staff = $this->staff();

        if (! $staff->hasVerifiedEmail()) {
            $staff->markEmailAsVerified();
            event(new Verified($staff));
        }
    }

    /**
     * Access the staff user using the "staff" guard.
     *
     * @return \App\Models\Staff|null
     */
    protected function staff()
    {
        return Auth::guard('staff')->user();
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return \Illuminate\Validation\Validator
     */
    public function withValidator(Validator $validator)
    {
        return $validator;
    }
}

