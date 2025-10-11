<?php

namespace App\Policies;

use App\Enums\Enums\UserRole;
use App\Models\Member;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MemberPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole([UserRole::MEMBERSHIP, UserRole::ELECTION]);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Member $member): bool
    {
        return $user->hasRole([UserRole::MEMBERSHIP, UserRole::ELECTION]);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole([UserRole::MEMBERSHIP]);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Member $member): bool
    {
        return $user->hasRole([UserRole::MEMBERSHIP]);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Member $member): bool
    {
        return $user->hasRole([UserRole::MEMBERSHIP]);
    }

    /**
     * Determine whether the user can export members.
     */
    public function export(User $user): bool
    {
        return $user->hasRole([UserRole::MEMBERSHIP, UserRole::ELECTION]);
    }
}
