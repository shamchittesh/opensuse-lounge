<?php

namespace App\Exports;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder;

class MemberExport extends ExportCSV
{
    protected function headers(): array
    {
        return [
            'Username',
            'Email Target',
            'Email Nick',
            'Email Full',
            'Libera Nick',
            'Libera Cloak',
            'Libera Cloak Applied',
            'Status',
            'Created At',
            'Updated At',
        ];
    }

    protected function query(): Builder
    {
        return Member::query()->orderBy('username');
    }

    protected function filename(): string
    {
        return 'members-'.date('Y-m-d-His').'.csv';
    }

    protected function rows($model): array
    {
        return [
            $model->username,
            $model->email_target,
            $model->email_nick,
            $model->email_full,
            $model->libera_nick,
            $model->libera_cloak,
            $model->libera_cloak_applied,
            $model->status->value,
            $model->created_at,
            $model->updated_at,
        ];
    }
}
