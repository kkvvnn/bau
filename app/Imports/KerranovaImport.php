<?php

namespace App\Imports;

use App\Models\Kerranova;
use App\Models\PrimaveraNew;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class KerranovaImport implements ToModel, WithHeadingRow, WithUpserts
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kerranova([
            'vendor_code' => $row['title'],
            'vendor_code_short' => $row['vendor_code_short'],
            'category' => $row['category'],
            'brand' => $row['brand'],
            'collection' => $row['collection'],
            'title' => ucfirst(strtolower($row['brand'])) . ' ' . $row['collection'] . ' ' . $row['title'] . ' ' . str_replace('ая', 'ый', $row['surface']),
            'format' => $row['format'],
            'length' => (int) $row['length'],
            'width' => (int) $row['width'],
            'fat' => (int) $row['fat'],
            'unit' => $row['unit'],
            'color' => $row['color'],
            'design' => $row['design'],
            'surface_code' => $row['surface_code'],
            'surface' => $row['surface'],
            'rectificat' => $row['rectificat'],
            'massa_one_meter' => (float) $row['massa_one_meter'],
            'square_in_pack' => (float) $row['square_in_pack'],
            'images' => explode(' | ', $row['images']),
        ]);
    }

    public function uniqueBy()
    {
        return 'vendor_code';
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
