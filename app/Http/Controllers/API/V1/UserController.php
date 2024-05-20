<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Laravel\Sanctum\HasApiTokens;

class UserController extends Controller
{
    use AuthorizesRequests, HasApiTokens;

    public function index()
    {
        $this->authorize('viewAny', User::class);

        return UserResource::collection(User::with('role')->with('department')->with('tickets')->withCount('tokens')->get());
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);

        return new UserResource(User::create($request->validated()));
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);

        $user->load('tickets', 'role', 'department');

        return new UserResource($user);
    }

    public function update(StoreUserRequest $request, User $user)
    {
//        $this->authorize('update', $user);

        $user->update($request->validated());

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
//        $this->authorize('delete', $user);

        $user->delete();

        return response()->json();
    }
}
