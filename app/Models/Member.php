<?php

namespace App\Models;

use App\Enums\Enums\MemberStatus;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email_target',
        'email_nick',
        'email_full',
        'libera_nick',
        'libera_cloak',
        'libera_cloak_applied',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => MemberStatus::class,
        ];
    }

    /**
     * Scope a query to only include members with specific status(es).
     *
     * @param MemberStatus|array<MemberStatus> $statuses
     */
    #[Scope]
    public function withStatus(Builder $query, MemberStatus|array $statuses): void
    {
        $statuses = is_array($statuses) ? $statuses : [$statuses];
        $statusValues = array_map(fn($status) => $status->value, $statuses);

        $query->whereIn('status', $statusValues);
    }
}
