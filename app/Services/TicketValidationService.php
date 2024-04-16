<?php

namespace App\Services;

use App\Rules\TicketRules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TicketValidationService
{
    public function validate(array $data): array
    {
        $validator = Validator::make($data, TicketRules::defaultRules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $data;
    }

}
