<?php

namespace App\Services;

use App\Models\Department;
use Illuminate\Support\Facades\Log;

class TicketAssignmentService
{
    public function assignTicketToNextAgent(Department $department)
    {
        $agents = $department->users()
            ->where('role_id', 3) // Assuming role_id '3' is for 'Agent'
            ->get();

        if ($agents->isEmpty()) {
            Log::info('No agents available');
        }

        $lastAssignedUserId = $department->last_assigned_user_id;
        $nextAgent = $this->getNextAgent($agents, $lastAssignedUserId);

        $department->last_assigned_user_id = $nextAgent->id;
        $department->save();

        return $nextAgent;
    }

    protected function getNextAgent($agents, $lastAssignedUserId)
    {
        if (is_null($lastAssignedUserId)) {
            return $agents->first();
        }

        $currentIndex = $agents->search(function ($user) use ($lastAssignedUserId) {
            return $user->id == $lastAssignedUserId;
        });

        $nextIndex = ($currentIndex + 1) % $agents->count();
        return $agents[$nextIndex];
    }
}

