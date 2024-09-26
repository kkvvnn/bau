<?php

namespace App\Imports;

use App\Models\Skalla;
use App\Models\SkallaPriceList;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class SkallaPriceListImport implements ToModel, WithHeadingRow, WithUpserts
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SkallaPriceList([
            'vendor_code' => $row['vendor_code'],
            'price_opt' => (int) $row['price_opt'],
            'price' => (int) $row['price'],
            'price_old' => (int) $row['price_old'],
            'sale' => (bool) $row['sale'],
            'new' => (bool) $row['new'],
        ]);
    }

    public function uniqueBy()
    {
        return 'vendor_code';
    }
}
