<?php

namespace App\Http\Requests;

use App\Rules\TicketRules;
use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    public function rules(): array
    {
        return TicketRules::defaultRules();
    }

    public function authorize(): bool
    {
        return true;
    }
}
