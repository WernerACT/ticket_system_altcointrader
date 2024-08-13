<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatusResource;
use App\Models\Department;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListStatusController extends Controller
{
    public function __invoke(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date . ' 23:59:59';
        $departmentId = $request->department_id;
        $allTickets = $request->all_tickets;
        $user = Auth::user();

        if ($departmentId == 0) {
            // If department is 0, get statuses across all departments
            $statusesQuery = Status::withCount(['tickets' => function ($query) use ($startDate, $endDate, $allTickets, $user) {
                // Filter tickets by the created_at date range
                $query->whereBetween('created_at', [$startDate, $endDate]);

                // If $allTickets is 0, limit ticket count to those where tickets belong to the authenticated user
                if ($allTickets == 0 && $user) {
                    $query->where('user_id', $user->id);
                }
            }]);
        } else {
            // Otherwise, get statuses for the specific department
            $department = Department::findOrFail($departmentId);
            $statusesQuery = $department->statuses($startDate, $endDate, $allTickets, $user ? $user->id : null);
        }

        $statuses = $statusesQuery->get();

        return response()->json([
            'success' => true,
            'statuses' => StatusResource::collection($statuses),
        ]);
    }
}

