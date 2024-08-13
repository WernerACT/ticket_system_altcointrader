<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ticket_id' => ['required', 'exists:tickets,id'],
            'body' => ['required', 'max:5000'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
