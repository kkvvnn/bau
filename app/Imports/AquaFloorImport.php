<?php

namespace App\Imports;

use App\Models\AquaFloor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

// use Maatwebsite\Excel\Concerns\WithChunkReading;

class AquaFloorImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new AquaFloor([
            'title' => $row['title'],
            'collection' => $row['collection'],
            'collection_url' => $row['collection_url'],
            'price' => $row['price'],
            'description_collection' => $row['description_collection'],
            'cound_decors' => $row['cound_decors'],
            'type_ucladki' => $row['type_ucladki'],
            'material' => $row['material'],
            'faska' => $row['faska'],
            'podlozhka' => $row['podlozhka'],
            'vendor_codes' => $row['vendor_codes'],
            'zashit_sloi' => $row['zashit_sloi'],
            'CPL' => $row['cpl'],
            'class_iznosost' => $row['class_iznosost'],
            'lenght' => $row['lenght'],
            'width' => $row['width'],
            'fat' => $row['fat'],
            'meters_in_pack' => $row['meters_in_pack'],
            'count_in_pack' => $row['count_in_pack'],
            'meters_in_palet' => $row['meters_in_palet'],
            'massa_pack' => $row['massa_pack'],
            'zamok' => $row['zamok'],
            'srok' => $row['srok'],
            'class_pozhar' => $row['class_pozhar'],
            'img_1' => $row['img_1'],
            'img_2' => $row['img_2'],
            'img_3' => $row['img_3'],
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'title';
    }
}
