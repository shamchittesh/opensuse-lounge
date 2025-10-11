<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MemberExportController
{
    public function __invoke(Request $request)
    {
        Gate::authorize('export', Member::class);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="members-'.date('Y-m-d-His').'.csv"',
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');

            fputcsv($file, [
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
            ]);

            Member::query()
                ->orderBy('username')
                ->chunk(100, function ($members) use ($file) {
                    foreach ($members as $member) {
                        fputcsv($file, [
                            $member->username,
                            $member->email_target,
                            $member->email_nick,
                            $member->email_full,
                            $member->libera_nick,
                            $member->libera_cloak,
                            $member->libera_cloak_applied,
                            $member->status->value,
                            $member->created_at,
                            $member->updated_at,
                        ]);
                    }
                });

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
