<?php

namespace App\Imports;

use App\Models\Aqua\AquaStock;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AquaStockImport implements ToModel, WithUpserts, WithHeadingRow, WithStartRow
{

    public array $del = [
        ' (4mm)',
        ' 3,252м2',
        ' 3,441м2',
    ];

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AquaStock([
            'vendor_code' => str_replace($this->del, '', $row[0]),
            'unit' => $row[5]??0,
            'stock_msk_germes' => (int) $row[7],
            'stock_msk_eger' => (int) $row[8],
            'stock_msk' => (int) $row[9],
        ]);
    }

    public function uniqueBy()
    {
        return 'vendor_code';
    }

    public function startRow(): int
    {
        return 10;
    }

}
