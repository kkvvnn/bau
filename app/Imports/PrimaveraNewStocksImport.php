<?php

namespace App\Imports;

use App\Models\PrimaveraNewStock;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PrimaveraNewStocksImport implements ToModel, WithUpserts, SkipsEmptyRows
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PrimaveraNewStock([
            'vendor_code' => explode(' ', $row[2])[0],
            'balance' => (float) $row[3],
        ]);
    }

    public function uniqueBy()
    {
        return 'vendor_code';
    }

}
