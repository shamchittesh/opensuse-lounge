<?php

namespace App\Exports;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder;

class ElectionExport extends ExportCSV
{
    protected function headers(): array
    {
        return [
            'Username',
            'Email Target',
            'Email Nick',
            'Email Full',
            'Status',
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
            $model->status->value,
        ];
    }
}
