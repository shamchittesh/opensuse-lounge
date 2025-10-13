<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Support\Str;

class StrMixin
{
    public function toBooleanFullTextQuery()
    {
        return function (string $search) {
            return Str::of($search)
                ->trim()
                ->replaceMatches('/[\s@.]+/', ' ')
                ->explode(' ')
                ->filter()
                ->map(fn ($term) => "+{$term}*")
                ->implode(' ');
        };
    }
}
