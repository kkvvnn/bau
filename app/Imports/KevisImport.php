<?php

namespace App\Imports;

use App\Models\Kevis;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class KevisImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kevis([
            'code' => $row['code'],
            'title' => $row['title'],
            'brand' => $row['brand'],
            'collection' => $row['collection'],
            'category' => $row['category'],
            'price' => $row['price'],
            'country' => $row['country'],
            'surface' => $row['surface'],
            'unit' => $row['unit'],
            'width' => $row['width'],
            'length' => $row['length'],
            'count_in_pack' => $row['count_in_pack'],
            'meters_in_pack' => $row['meters_in_pack'],
            'images' => $row['images'],
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'code';
    }
}
