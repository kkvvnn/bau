<?php

namespace App\Imports;

use App\Models\PrimaveraPriceList;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PrimaveraPriceListImport implements ToModel, WithUpserts, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PrimaveraPriceList([
            'vendor_code' => $row['vendor_code'],
            'title' => $row['title'],
            'unit' => $row['unit'],
            'price' => (int) $row['price'],
            'price_opt' => (int) $row['price_opt'],
        ]);
    }

    public function uniqueBy()
    {
        return 'vendor_code';
    }

}
