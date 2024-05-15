<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketHistoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ticket_id' => ['required', 'exists:tickets'],
            'comment' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
