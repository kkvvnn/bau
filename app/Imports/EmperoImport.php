<?php

namespace App\Imports;

use App\Models\Empero;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class EmperoImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Empero([
            'vendor_code' => $row['vendor_code'],
            'title' => ($row['vendor_code'] != "01-00009347") ? $row['title'] : 'Empero Montblan 2 Универсальная 60x120',
            'price' => (int) $row['price'],
            'collection' => $row['collection'],
            'brand' => $row['factory'],
            'size' => $row['size'],
            'width' => mb_substr($row['size'], 0, mb_strpos($row['size'], 'х')),
            'length' => mb_substr($row['size'], mb_strpos($row['size'], 'х') + 1),
            'fat' => str_replace(' мм', '', $row['fat']),
            'stock' => (int) $row['stock'],
            'stock_real' => (int) $row['stock_real'],
            'square_one' => $row['square_one'],
            'images' => json_decode($row['images']),
            'img_collection' => json_decode($row['img_collection']),
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
