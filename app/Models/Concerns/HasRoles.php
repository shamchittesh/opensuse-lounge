<?php

namespace App\Models\Concerns;

use App\Enums\Enums\UserRole;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;

trait HasRoles
{
    /**
     * Scope a query to only include users with specific role(s).
     *
     * @param  UserRole|array<UserRole>  $roles
     */
    #[Scope]
    public function withRole(Builder $query, UserRole|array $roles): void
    {
        $roles = is_array($roles) ? $roles : [$roles];
        $roleValues = array_map(fn ($role) => $role->value, $roles);

        $query->where(function (Builder $q) use ($roleValues) {
            foreach ($roleValues as $role) {
                $q->orWhereJsonContains('roles', $role);
            }
        });
    }

    /**
     * Check if user has any of the specified roles.
     *
     * @param  UserRole|array<UserRole>  $roles
     */
    public function hasRole(UserRole|array $roles): bool
    {
        $roles = is_array($roles) ? $roles : [$roles];
        $userRoles = $this->roles ?? [];

        foreach ($roles as $role) {
            if (in_array($role->value, $userRoles)) {
                return true;
            }
        }

        return false;
    }
}
