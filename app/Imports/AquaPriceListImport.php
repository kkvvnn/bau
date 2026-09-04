<?php

namespace App\Imports;

use App\Models\Aqua\AquaCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class AquaPriceListImport implements ToModel, WithUpserts, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AquaCollection([
            'category' => $row['category'],
            'slug' => $row['slug'],
            'brand' => $row['brand'],
            'collection_in_price' => $row['collection_in_price'],
            'collection' => $row['collection'],
            'type_in_price' => $row['type_in_price'],
            'price_opt' => (int)$row['price_opt'],
            'price' => (int)$row['price'],
            'count_decors' => (int)$row['count_decors'],
            'protect_layer' => (float)$row['protect_layer'],
            'tisnenie_v_register' => $row['tisnenie_v_register'],
            'type' => $row['type'],
            'connection' => $row['connection'],
            'faska' => $row['faska'],
            'podlozhka' => $row['podlozhka'],
            'size' => $row['size'],
            'fat' => (float)$row['fat'],
            'class' => $row['class'],
            'count_in_pack' => $row['count_in_pack'],
            'meters_in_pack' => (float)$row['meters_in_pack'],
            'massa_pack' => (float)$row['massa_pack'],
            'image' => $row['image'],
        ]);
    }

    public function uniqueBy()
    {
        return 'slug';
    }

}
