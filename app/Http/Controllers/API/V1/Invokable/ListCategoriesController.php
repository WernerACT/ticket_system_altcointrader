<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListCategoriesController extends Controller
{
    public function __invoke(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date . ' 23:59:59';
        $departmentId = $request->department_id;
        $statusId = $request->status_id;
        $allTickets = $request->all_tickets;
        $user = Auth::user();

        // Handle the case where all departments are selected (departmentId = 0)
        if ($departmentId == 0) {
            $categoriesQuery = Category::with('tickets')->withCount(['tickets' => function ($query) use ($startDate, $endDate, $departmentId, $statusId, $allTickets, $user) {
                // Filter tickets by the created_at date range
                $query->whereBetween('created_at', [$startDate, $endDate]);
                if ($statusId)
                {
                    if ($departmentId)
                    {
                        $query->where('department_id', $departmentId);
                    }

                    $query->where('status_id', $statusId);
                }

                // If $allTickets is 0, limit ticket count to those where tickets belong to the authenticated user
                if ($allTickets == 0 && $user) {
                    $query->where('user_id', $user->id);
                }
            }]);
        } else {
            $department = Department::findOrFail($departmentId);
            $categoriesQuery = $department->categories()->with('tickets')->withCount(['tickets' => function ($query) use ($startDate, $endDate, $departmentId, $statusId, $allTickets, $user) {
                // Filter tickets by the created_at date range
                $query->whereBetween('created_at', [$startDate, $endDate]);

                if ($departmentId !== 0)
                {
                    $query->where('department_id', $departmentId);
                }

                if ($statusId !== 0)
                {
                    $query->where('status_id', $statusId);
                }

                // If $allTickets is 0, limit ticket count to those where tickets belong to the authenticated user
                if ($allTickets == 0 && $user) {
                    $query->where('user_id', $user->id);
                }
            }]);
        }

        // Handle the case where all statuses are selected (statusId = 0)
        if ($statusId && $statusId != 0) {
            $categoriesQuery->whereHas('tickets', function ($query) use ($departmentId, $statusId, $startDate, $endDate) {
                $query->where('status_id', $statusId)
                    ->whereBetween('created_at', [$startDate, $endDate]);

                if ($departmentId !== 0)
                {
                    $query->where('department_id', $departmentId);
                }
            });
        }

        $categories = $categoriesQuery->get();

        return response()->json([
            'success' => true,
            'categories' => CategoryResource::collection($categories),
        ]);
    }
}
