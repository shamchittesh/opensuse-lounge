<?php

declare(strict_types=1);

namespace App\Concerns;

trait Enumerable
{
    /**
     * Convert enums to select.
     */
    public static function asSelect(): array
    {
        $array = [];

        foreach (self::cases() as $case) {
            $array[$case->value] = str($case->name)->title()->toString();
        }

        return $array;
    }

    public static function has(string|array $value): bool
    {
        $values = is_array($value) ? $value : [$value];

        foreach (self::cases() as $case) {
            if (in_array($case->value, $values)) {
                return true;
            }
        }

        return false;
    }
}
