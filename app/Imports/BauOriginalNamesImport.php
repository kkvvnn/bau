<?php

namespace App\Imports;

use App\Models\BauOriginalName;
use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class BauOriginalNamesImport implements ToModel, WithHeadingRow, WithUpserts, WithChunkReading
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new BauOriginalName([
            'Element_Code' => $row['element_code'],
            'Name' => $row['name'],
            'slug' => STR::slug($row['producer_brand'].'-'.$row['name']),
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'Element_Code';
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
