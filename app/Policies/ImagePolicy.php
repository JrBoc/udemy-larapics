<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Image $image): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Image $image): bool
    {
        return $user->id === $image->user_id || $user->role === Role::Editor;
    }

    public function delete(User $user, Image $image): bool
    {
        return $user->id === $image->user_id;
    }
    public function restore(User $user, Image $image): bool
    {
        return true;
    }

    public function forceDelete(User $user, Image $image): bool
    {
        return true;
    }
}
