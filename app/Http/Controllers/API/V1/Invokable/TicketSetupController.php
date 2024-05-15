<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\StatusResource;
use App\Models\Department;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketSetupController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $statuses = Status::withCount('tickets')->get();

        $departments = Department::withCount(['tickets' => function ($query) {
            $query->whereDoesntHave('status', function ($query) {
                $query->whereIn('name', ['Closed', 'Spam']);
            });
        }])->get();

        $user = Auth::user();

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
            'statuses' => StatusResource::collection($statuses),
            'departments' => DepartmentResource::collection($sortedDepartments),
        ]);
    }
}
