<?php

namespace App\Rules;

class TicketRules
{
    public static function defaultRules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255'],
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'status_id' => ['required', 'integer', 'exists:statuses,id'],
            'user_id' => ['required', 'integer', 'exists:users,id']
        ];
    }
}
