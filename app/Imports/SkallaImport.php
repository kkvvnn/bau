<?php

namespace App\Imports;

use App\Models\Skalla;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class SkallaImport implements ToModel, WithHeadingRow, WithUpserts
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Skalla([
            'vendor_code' => $row['vendor_code'],
            'collection' => $row['collection'],
            'brand' => 'SKALLA',
            'title' => $row['title'],
            'slug' => Str::slug($row['title']),
            'slug_collection' => Str::slug($row['collection']),
            'description' => $row['description'],
//            'new' => (bool) $row['new'],
//            'sale' => (bool) $row['sale'],
//            'price_opt' => (int) $row['price_opt'],
//            'price' => (int) $row['price'],
//            'price_old' => (int) $row['price_old'],
            'unit' => $row['unit'],
            'length' => (int) $row['length'],
            'width' => (int) $row['width'],
            'fat' => (float) $row['fat'],
            'count_in_pack' => (int) $row['count_in_pack'],
            'square_in_pack' => (float) $row['square_in_pack'],
            'massa_pack' => (float) $row['massa_pack'],
            'faska' => $row['faska'],
            'class' => (int) $row['class'],
            'color' => $row['color'],
            'design' => $row['design'],
            'images' => explode(' | ', $row['images']),
        ]);
    }

    public function uniqueBy()
    {
        return 'vendor_code';
    }
}
