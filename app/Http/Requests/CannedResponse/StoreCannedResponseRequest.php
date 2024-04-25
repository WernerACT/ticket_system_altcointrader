<?php

namespace App\Http\Requests\CannedResponse;

use Illuminate\Foundation\Http\FormRequest;

class StoreCannedResponseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'keywords' => ['required'],
            'body' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
