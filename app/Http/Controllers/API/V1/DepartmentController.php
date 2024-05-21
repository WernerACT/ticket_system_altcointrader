<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\StoreDepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DepartmentController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $departments = Department::all()->whereNotIn('name', ['ExCo']);
        return response()->json([
            'success' => true,
            'departments' => DepartmentResource::collection($departments)
        ]);
    }

    public function store(StoreDepartmentRequest $request)
    {
        $this->authorize('create', Department::class);

        return new DepartmentResource(Department::create($request->validated()));
    }

    public function show(Department $cannedResponse)
    {
        $this->authorize('view', $cannedResponse);

        return new DepartmentResource($cannedResponse);
    }

    public function update(StoreDepartmentRequest $request, Department $cannedResponse)
    {
        $this->authorize('update', $cannedResponse);

        $cannedResponse->update($request->validated());

        return new DepartmentResource($cannedResponse);
    }

    public function destroy(Department $cannedResponse)
    {
        $this->authorize('delete', $cannedResponse);

        $cannedResponse->delete();

        return response()->json();
    }
}
