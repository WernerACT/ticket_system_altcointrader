<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListDepartmentsController extends Controller
{
    public function __invoke(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date . ' 23:59:59';
        $allTickets = $request->all_tickets;
        $user = Auth::user();

        // Base query to get all departments except "Technical" and "Exco", and count tickets created within the date range
        $departmentsQuery = Department::whereNotIn('name', ['Technical', 'Exco'])
            ->withCount(['tickets' => function ($query) use ($startDate, $endDate, $allTickets, $user) {
                $query->whereBetween('created_at', [$startDate, $endDate]);

                // If $allTickets is 0, limit the ticket count to those where tickets belong to the authenticated user
                if ($allTickets == 0 && $user) {
                    $query->where('user_id', $user->id);
                }
            }]);

        // If $allTickets is 0, limit the departments to those where tickets belong to the authenticated user
        if ($allTickets == 0 && $user) {
            $departmentsQuery->orWhereHas('tickets', function ($query) use ($startDate, $endDate, $user) {
                $query->whereBetween('created_at', [$startDate, $endDate])
                    ->where('user_id', $user->id);
            });
        }

        // Get all departments excluding "Technical" and "Exco"
        $departments = $departmentsQuery->get();

        // Sort departments with the user's department first if authenticated
        if ($user) {
            $userDepartmentId = $user->department_id;
            $sortedDepartments = $departments->sortByDesc(function ($department) use ($userDepartmentId) {
                return $department->id == $userDepartmentId;
            });
        } else {
            $sortedDepartments = $departments;
        }

        return response()->json([
            'success' => true,
            'departments' => DepartmentResource::collection($sortedDepartments),
        ]);
    }
}
