<?php

namespace App\Imports;

use App\Models\PrimaveraNew;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class PrimaveraNewImport implements ToModel, WithUpserts, WithStartRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PrimaveraNew([
            'category' => $row[0],
            'type' => $row[1],
            'title' => $row[2],
            'brand' => $row[3],
            'collection' => $row[4],
            'vendor_code' => $row[5],
            'color' => $row[6],
            'image_collection' => $row[7],
            'images' => explode(';', $row[8]),
            'for_room' => explode(';', $row[9]),
            'fat' => $row[10],
            'factura' => $row[11],
            'for' => $row[12],
            'unit' => $row[13],
            'class_stoikost' => $row[14],
            'surface' => $row[15],
            'cover' => $row[16],
            'design' => $row[17],
            'country' => $row[18],
            'description' => $row[19],
            'shtrikhkod' => $row[20],
            'form' => $row[21],
            'rectificat' => $row[22],
            'size_format' => $row[23],
            'length' => $row[24],
            'width' => $row[25],
            'massa_pack' => $row[26],
            'count_in_pack' => (int)$row[27],
            'length_pack' => $row[28],
            'width_pack' => $row[29],
            'fat_pack' => $row[30],
            'square_in_pack' => $row[31],
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
