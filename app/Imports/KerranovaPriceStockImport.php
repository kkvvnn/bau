<?php

namespace App\Imports;

use App\Models\KerranovaPriceStock;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class KerranovaPriceStockImport implements ToModel, WithUpserts, SkipsEmptyRows
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KerranovaPriceStock([
            'vendor_code' => $row[0],
            'price' => (int) str_replace(' ', '', $row[1]),
            'balance' => (float) $row[2],
        ]);
    }

    public function uniqueBy()
    {
        return 'vendor_code';
    }

}
