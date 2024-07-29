<?php

namespace App\Policies;

use App\Models\Subplace;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SubplacePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['basic', 'admin', 'super_admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Subplace $subplace): bool
    {
        return in_array($user->role, ['basic', 'admin', 'super_admin']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['basic', 'admin', 'super_admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Subplace $subplace): bool
    {
        return in_array($user->role, ['basic', 'admin', 'super_admin']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Subplace $subplace): bool
    {
        return in_array($user->role, ['admin', 'super_admin']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Subplace $subplace): bool
    {
        return in_array($user->role, ['admin', 'super_admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Subplace $subplace): bool
    {
        return in_array($user->role, ['admin', 'super_admin']);
    }
}
