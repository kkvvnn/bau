<?php

namespace App\Imports;

use App\Models\PixmosaicNew;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PixmosaicNewImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PixmosaicNew([
            'vendor_code' => str_replace(' ', '', trim($row['vendor_code'])),
            'title' => $row['title'],
            'title2' => $row['title2'],
            'price' => (int) str_replace("\xC2\xA0", '', $row['price']),
            'stock' => str_replace(' м2', '', $row['stock']),
            'size_tile' => $row['size_tile'],
            'size_chip' => $row['size_chip'],
            'fat' => $row['fat'],
            'osnova' => $row['osnova'],
            'material' => $row['material'],
            'surface' => $row['surface'],
            'square_list' => $row['square_list'],
            'img' => 'https://pixmosaic.ru'.$row['img'],
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
