<?php

namespace App\Policies;

use App\Models\Status;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Status $status): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Status $status): bool
    {
        return true;
    }

    public function delete(User $user, Status $status): bool
    {
        return true;
    }

    public function restore(User $user, Status $status): bool
    {
        return true;
    }

    public function forceDelete(User $user, Status $status): bool
    {
        return true;
    }
}
