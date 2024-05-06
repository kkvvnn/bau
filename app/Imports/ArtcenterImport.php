<?php

namespace App\Imports;

use App\Models\Artcenter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ArtcenterImport implements ToModel, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Artcenter([
            'code' => str_replace('#NULL!', '', $row[0]),
            'vendor_code' => str_replace('#NULL!', '', $row[1]),
            'title' => str_replace('#NULL!', '', $row[2]),
            'brand' => str_replace('#NULL!', '', $row[3]),
            'collection' => str_replace('#NULL!', '', $row[4]),
            'material' => str_replace('#NULL!', '', $row[5]),
            'for' => str_replace('#NULL!', '', $row[6]),
            'surface' => str_replace('#NULL!', '', $row[7]),
            'size' => str_replace('#NULL!', '', $row[8]),
            'rectified' => str_replace('#NULL!', '', $row[9]),
            'picture_surface' => str_replace('#NULL!', '', $row[10]),
            'style' => str_replace('#NULL!', '', $row[11]),
            'color' => str_replace('#NULL!', '', $row[12]),
            'unit' => str_replace('#NULL!', '', $row[13]),
            'fat' => str_replace('#NULL!', '', $row[14]),
            'meters_in_pack' => str_replace('#NULL!', '', $row[15]),
            'image1' => str_replace('#NULL!', '', $row[16]),
            'image2' => str_replace('#NULL!', '', $row[17]),
            'image3' => str_replace('#NULL!', '', $row[18]),
            'image4' => str_replace('#NULL!', '', $row[19]),
            'price' => (int)$row[20],
            'kazan_stock' => str_replace('#NULL!', '', $row[21]),
            'moscow_stock' => str_replace('#NULL!', '', $row[22]),
            'nn_stock' => str_replace('#NULL!', '', $row[23]),
            'samara_stock' => str_replace('#NULL!', '', $row[24]),
            'spb_stock' => str_replace('#NULL!', '', $row[25]),
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
