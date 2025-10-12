<?php

namespace App\Enums\Enums;

use App\Concerns\Enumerable;

enum MemberStatus: string
{
    use Enumerable;

    case EMERITUS = 'emeritus';
    case ACTIVE = 'active';
}
