<?php

namespace App\Imports\AbsolutGres;

use App\Models\AbsolutGres\AbsolutGresScrap;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class AbsolutGresScrapImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new AbsolutGresScrap([
            'url' => $row['url'],
            'title' => $row['title'],
            'title_avito' => $row['title_avito'],
            'available' => $row['available'],
            'sale' => $row['sale'],
            'price' => $row['price'],
            'price_old' => $row['price_old'],
            'unit' => $row['unit'],
            'brand' => $row['brand'],
            'country' => $row['country'],
            'collection' => $row['collection'],
            'style' => $row['style'],
            'vendor_code' => $row['vendor_code'],
            'surface' => $row['surface'],
            'size' => $row['size'],
            'length' => $row['length'],
            'width' => $row['width'],
            'pack_weight' => $row['pack_weight'],
            'one_count_weight' => $row['one_count_weight'],
            'count_in_pack' => $row['count_in_pack'],
            'meters_in_pack' => $row['meters_in_pack'],
            'one_count_square' => $row['one_count_square'],
            'picture' => null,
            'name_from_xml' => null,
            'price_from_xml' => null,
            'id_from_xml' => null,
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
