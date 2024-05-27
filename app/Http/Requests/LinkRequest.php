<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'canned_response_id' => ['nullable', 'exists:canned_responses'],
            'title' => ['required'],
            'url' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
