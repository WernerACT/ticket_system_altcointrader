<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'path' => ['required'],
            'imageable_id' => ['required', 'integer'],
            'imageable_type' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
