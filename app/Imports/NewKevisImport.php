<?php

namespace App\Imports;

use App\Models\Kevis;
use App\Models\NewKevis;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class NewKevisImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NewKevis([
            'code' => $row['code'],
            'slug' => STR::slug($row['title']),
            'title' => $row['title'],
            'brand' => $row['brand'],
            'collection' => $row['collection'],
            'category' => $row['category'],
            'price' => $row['price'],
            'price_opt' => $row['price_opt'],
            'price_old' => $row['price_old'],
            'country' => $row['country'],
            'surface' => $row['surface'],
            'unit' => $row['unit'],
            'size' => $row['size'],
            'width' => $row['width'],
            'length' => $row['length'],
            'thickness' => $row['thickness'],
            'rectified' => $row['rectified'],
            'count_in_pack' => $row['count_in_pack'],
            'meters_in_pack' => $row['meters_in_pack'],
            'design' => $row['design'],
            'color' => $row['color'],
            'images' => $row['images'],
            'videos' => $row['videos'],
        ]);
    }

    /**
     * @return string
     */
    public function uniqueBy(): string
    {
        return 'code';
    }
}
