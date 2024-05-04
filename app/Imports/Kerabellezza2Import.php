<?php

namespace App\Imports;

use App\Models\Kerabellezza2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class Kerabellezza2Import implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kerabellezza2([
            'type' => $row['type'],
            'parent_code' => $row['parent_code'],
            'title' => $row['title'],
            'price_opt' => $row['price_opt'],
            'price' => $row['price'],
            'color' => $row['color'],
            'shtrih_code' => $row['shtrih_code'],
            'image' => $row['image'],
        ]);
    }


}
