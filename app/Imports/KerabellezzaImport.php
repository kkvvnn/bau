<?php

namespace App\Imports;

use App\Models\Kerabellezza;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class KerabellezzaImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kerabellezza([
            'title' => $row['title'],
            'vendor_code' => $row['vendor_code'],
            'price' => $row['price'],
            'description' => $row['description'],
            'brand' => $row['brand'],
            'country' => $row['country'],
            'class' => $row['class'],
            'shov' => $row['shov'],
            'massa' => $row['massa'],
            'froze_resistant' => $row['froze_resistant'],
            'vid_rabot' => $row['vid_rabot'],
            'country_proizv' => $row['country_proizv'],
            'images' => $row['images'],
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
