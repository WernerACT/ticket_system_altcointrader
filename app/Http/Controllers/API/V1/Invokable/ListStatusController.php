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

        // Base query to get all statuses and count tickets created within the date range
        $statusesQuery = Status::withCount(['tickets' => function ($query) use ($startDate, $endDate, $allTickets, $user, $departmentId) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
            if ($departmentId)
            {
                $query->where('department_id', $departmentId);
            }

            // If $allTickets is 0, limit the ticket count to those where tickets belong to the authenticated user
            if ($allTickets == 0 && $user) {
                $query->where('user_id', $user->id);
            }
        }]);

        $statuses = $statusesQuery->get();

        return response()->json([
            'success' => true,
            'statuses' => StatusResource::collection($statuses),
        ]);
    }
}
