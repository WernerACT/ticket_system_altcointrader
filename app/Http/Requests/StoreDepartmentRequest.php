<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:32', 'unique:departments,name'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
