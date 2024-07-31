<?php

namespace App\Http\Requests\Response;

use Illuminate\Foundation\Http\FormRequest;

class StoreResponseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ticket_id' => ['required', 'exists:tickets,id'],
            'status_id' => ['required', 'exists:statuses,id'],
            'body' => ['required', 'max:5000'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
