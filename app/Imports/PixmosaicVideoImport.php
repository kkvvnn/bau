<?php

namespace App\Imports;

use App\Models\PixmosaicVideo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PixmosaicVideoImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PixmosaicVideo([
            'vendor_code' => str_replace(' ', '', trim($row['vendor_code'])),
            'video_url' => $row['video_url'],
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
