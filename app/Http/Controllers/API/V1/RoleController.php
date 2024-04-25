<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Role::class);

        return RoleResource::collection(Role::all());
    }

    public function store(StoreRoleRequest $request)
    {
        $this->authorize('create', Role::class);

        return new RoleResource(Role::create($request->validated()));
    }

    public function show(Role $cannedResponse)
    {
        $this->authorize('view', $cannedResponse);

        return new RoleResource($cannedResponse);
    }

    public function update(StoreRoleRequest $request, Role $cannedResponse)
    {
        $this->authorize('update', $cannedResponse);

        $cannedResponse->update($request->validated());

        return new RoleResource($cannedResponse);
    }

    public function destroy(Role $cannedResponse)
    {
        $this->authorize('delete', $cannedResponse);

        $cannedResponse->delete();

        return response()->json();
    }
}
