<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketDepartmentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Ticket $ticket)
    {
        $currentDepartmentId = $ticket->department_id;

        $departments = Department::where('id', '!=', $currentDepartmentId)
            ->whereNotIn('name', ['ExCo'])->get();

        return response()->json([
            'success' => true,
            'data' => DepartmentResource::collection($departments)
        ]);

    }
}
