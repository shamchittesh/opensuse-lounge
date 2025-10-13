<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\Enums\UserRole;
use App\Exports\ElectionExport;
use App\Exports\MemberExport;
use App\Models\Member;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Support\Facades\Gate;

class MemberExportController
{
    public function __invoke(#[CurrentUser] User $user)
    {
        Gate::authorize('export', Member::class);

        if ($user->hasRole(UserRole::MEMBERSHIP)) {
            return MemberExport::make()->download();
        }

        return ElectionExport::make()->download();
    }
}
