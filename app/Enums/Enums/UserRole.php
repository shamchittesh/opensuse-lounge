<?php

declare(strict_types=1);

namespace App\Enums\Enums;

use App\Concerns\Enumerable;

enum UserRole: string
{
    use Enumerable;

    case MEMBERSHIP = 'membership';
    case ELECTION = 'election';
    case HEROES = 'heroes';
}
