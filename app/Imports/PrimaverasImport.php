<?php

namespace App\Imports;

use App\Models\Primavera;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PrimaverasImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Primavera([
            'vendor_code' => $row['vendor_code'],
            'title' => $row['title'],
            'title_avito' => $row['title_avito'],
            'price' => $row['price'],
            'pack_massa' => $row['pack_massa'],
            'img1' => $row['img1'],
            'img2' => $row['img2'],
            'brand' => $row['brand'],
            'color' => $row['color'],
            'color_name' => $row['color_name'],
            'length' => $row['length'],
            'width' => $row['width'],
            'count_in_pack' => $row['count_in_pack'],
            'meters_in_pack' => $row['meters_in_pack'],
            'format' => $row['format'],
            'type' => $row['type'],
            'annotation' => $row['annotation'],
            'country' => $row['country'],
            'fat' => $row['fat'],
            'factura_poverhnosti' => $row['factura_poverhnosti'],
            'osobennosti' => $row['osobennosti'],
            'for' => $row['for'],
            'iznosostoikost' => $row['iznosostoikost'],
            'poverhnost' => $row['poverhnost'],
            'decor' => $row['decor'],
            'form' => $row['form'],
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
