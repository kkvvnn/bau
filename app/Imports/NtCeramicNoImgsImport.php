<?php

namespace App\Imports;

use App\Models\NTCeramic\NtCeramicNoImgs;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class NtCeramicNoImgsImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NtCeramicNoImgs([
            'vendor_code' => $row['vendor_code'],
            'collection' => $row['collection'],
            'title' => $row['title'],
            'brand' => $row['brand'],
            'country' => $row['country'],
            'size_mm' => $row['size_mm'],
            'size_cm' => $row['size_cm'],
            'fat' => $row['fat'],
            'surface' => $row['surface'],
            'square_in_pack' => $row['square_in_pack'],
            'count_in_pack' => $row['count_in_pack'],
            'massa_of_pack' => $row['massa_of_pack'],
            'square_one' => $row['square_one'],
            'massa_one' => $row['massa_one'],
            'price_opt' => $row['price_opt'],
            'price' => $row['price'],
            'note' => $row['note'],
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
