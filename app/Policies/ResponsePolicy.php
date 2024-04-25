<?php

namespace App\Policies;

use App\Models\Response;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResponsePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Response $response): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Response $response): bool
    {
        return true;
    }

    public function delete(User $user, Response $response): bool
    {
        return true;
    }

    public function restore(User $user, Response $response): bool
    {
        return true;
    }

    public function forceDelete(User $user, Response $response): bool
    {
        return true;
    }
}
