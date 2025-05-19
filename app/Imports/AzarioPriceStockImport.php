<?php

namespace App\Imports;

use App\Models\AzarioPriceStock;
use App\Models\KerranovaPriceStock;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class AzarioPriceStockImport implements ToModel, WithUpserts, SkipsEmptyRows, WithBatchInserts, WithChunkReading
{
    use Importable;

    public function isEmptyWhen(array $row): bool
    {
        return $row[9] !== 'КЕРАМОГРАНИТ';
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AzarioPriceStock([
            'vendor_code' => $row[0],
            'price' => (int) $row[7],
            'price_opt' => (int) $row[4],
            'stock' => (float) str_replace(',', '.', $row[2]),
            'stock_moscow' => (float) str_replace(',', '.', $row[11]),
            'stock_krasnodar' => (float) str_replace(',', '.', $row[12]),
        ]);
    }

    public function uniqueBy()
    {
        return 'vendor_code';
    }

    public function batchSize(): int
    {
        return 2000;
    }

    public function chunkSize(): int
    {
        return 2000;
    }

}
