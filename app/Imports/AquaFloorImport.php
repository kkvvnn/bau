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
            'url' => $row['url'],
            'title' => $row['title'],
            'vendor_code' => $row['vendor_code'],
            'price' => (int)$row['price'],
            'collection' => $row['collection'],
            'razmer' => $row['razmer'],
            'klass_iznosostojkosti' => $row['klass_iznosostojkosti'],
            'kolichestvo_polos' => (int)$row['kolichestvo_polos'],
            'tip_soedineniya' => $row['tip_soedineniya'],
            'country' => $row['country'],
            'tip_risunka' => $row['tip_risunka'],
            'vlagostojkost' => $row['vlagostojkost'],
            'count_in_box' => (int)$row['count_in_box'],
            'srok_year' => (int)$row['srok_year'],
            'material' => $row['material'],
            'vstroennaya_podlozhka' => $row['vstroennaya_podlozhka'],
            'zashhitnuy_sloy_mm' => $row['zashhitnuy_sloy_mm'],
            'klass_pozharniy' => $row['klass_pozharniy'],
            'shumoizolyacziya' => $row['shumoizolyacziya'],
            'tehnologiya_cpl' => $row['tehnologiya_cpl'],
            'dlina' => $row['dlina'],
            'shirina' => $row['shirina'],
            'fat' => $row['fat'],
            'massa_box' => $row['massa_box'],
            'faska' => $row['faska'],
            'picture' => $row['picture'],
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
