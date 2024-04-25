<?php

namespace App\Policies;

use App\Models\CannedResponse;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CannedResponsePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, CannedResponse $cannedResponse): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, CannedResponse $cannedResponse): bool
    {
        return true;
    }

    public function delete(User $user, CannedResponse $cannedResponse): bool
    {
        return true;
    }

    public function restore(User $user, CannedResponse $cannedResponse): bool
    {
        return true;
    }

    public function forceDelete(User $user, CannedResponse $cannedResponse): bool
    {
        return true;
    }
}
