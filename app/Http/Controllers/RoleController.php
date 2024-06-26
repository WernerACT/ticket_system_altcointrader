<?php

namespace App\Http\Controllers;

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

    public function show(Role $role)
    {
        $this->authorize('view', $role);

        return new RoleResource($role);
    }

    public function update(StoreRoleRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        $role->update($request->validated());

        return new RoleResource($role);
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        return response()->json();
    }
}
