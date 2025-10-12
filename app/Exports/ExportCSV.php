<?php

declare(strict_types=1);

namespace App\Exports;

use App\Concerns\Makeable;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * @phpstan-consistent-constructor
 */
abstract class ExportCSV
{
    use Makeable;

    /**
     * Get the CSV headers.
     *
     * @return array<string>
     */
    abstract protected function headers(): array;

    /**
     * Get the query builder for the export.
     */
    abstract protected function query(): Builder;

    /**
     * Get the filename for the export.
     */
    abstract protected function filename(): string;

    /**
     * Map a model to CSV row.
     *
     * @return array<mixed>
     */
    abstract protected function rows($model): array;

    /**
     * Export the data as a streamed CSV response.
     */
    public function download(): StreamedResponse
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="'.$this->filename().'"',
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');

            fputcsv($file, $this->headers());

            $this->query()
                ->chunk(100, function ($models) use ($file) {
                    foreach ($models as $model) {
                        fputcsv($file, $this->rows($model));
                    }
                });

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
