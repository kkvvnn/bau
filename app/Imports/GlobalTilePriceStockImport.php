<?php

namespace App\Imports;

use App\Models\GlobalTilePriceStock;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithStartRow;

//HeadingRowFormatter::default('none');
class GlobalTilePriceStockImport implements ToModel, SkipsEmptyRows, WithUpserts, WithStartRow
{

    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GlobalTilePriceStock([
            'vendor_code' => $row[1]??'',
            'unit' => $row[2],
            'status' => $row[3],
            'format' => $row[4],
            'count_in_pack' => $row[5],
            'weight_pack' => $row[6],
            'price_rbc' => (int)$row[9]??0,
            'price' => (int)$row[10]??0,
            'stock' => (int)$row[11]??0,
//            'price_rbc' => 111,
//            'price' => 222,
//            'stock' => 5000,
        ]);
    }

    public function uniqueBy(): string
    {
        return 'vendor_code';
    }

    public function startRow(): int
    {
        return 4;
    }
}
