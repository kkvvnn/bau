<?php

namespace App\Imports;

use App\Models\Pixmosaic;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PixmosaicsImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pixmosaic([
            'vendor_code' => $row['vendor_code'],
            'price' => $row['price'],
            'title' => $row['title'],
            'material' => $row['material'],
            'fat' => $row['fat'],
            'chip_size' => $row['chip_size'],
            'surface' => $row['surface'],
            'module_size' => $row['module_size'],
            'img' => $row['img'],
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'vendor_code';
    }
}
