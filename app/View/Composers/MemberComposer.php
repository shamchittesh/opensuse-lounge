<?php

declare(strict_types=1);

namespace App\View\Composers;

use App\Models\User;
use App\Models\Member;
use Illuminate\View\View;

class MemberComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        /**
         * @var User|null $user
         */
        $user = auth()->user();

        $view->with([
            'canViewMembers' => $user?->can('viewAny', Member::class) ?? false,
            'canCreateMembers' => $user?->can('create', Member::class) ?? false,
            'canUpdateMembers' => $user?->can('update', Member::class) ?? false,
            'canDeleteMembers' => $user?->can('delete', Member::class) ?? false,
            'canExportMembers' => $user?->can('export', Member::class) ?? false,
        ]);
    }
}
