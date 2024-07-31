<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'path' => ['required', 'clamav'],
            'documentable_id' => ['required', 'integer'],
            'documentable_type' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
