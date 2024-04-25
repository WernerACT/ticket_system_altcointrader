<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254', Rule::unique('users', 'email')->ignore($this->user->id)],
            'user_reference' => ['nullable'],
            'site_access_key' => ['nullable'],
            'active' => ['nullable'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['nullable'],
            'remember_token' => ['nullable'],
            'role_id' => ['required', 'integer', 'exists:roles,id'],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'current_team_id' => ['nullable', 'integer'],
            'profile_photo_path' => ['nullable'],
            'two_factor_secret' => ['nullable'],
            'two_factor_recovery_codes' => ['nullable'],
            'two_factor_confirmed_at' => ['nullable', 'date'],
        ];
    }
}
