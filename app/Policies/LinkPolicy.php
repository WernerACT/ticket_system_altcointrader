<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LinkPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Link $link): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Link $link): bool
    {
        return true;
    }

    public function delete(User $user, Link $link): bool
    {
        return true;
    }

    public function restore(User $user, Link $link): bool
    {
        return true;
    }

    public function forceDelete(User $user, Link $link): bool
    {
        return true;
    }
}
