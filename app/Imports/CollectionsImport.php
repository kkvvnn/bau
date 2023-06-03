<?php

namespace App\Imports;

use App\Models\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class CollectionsImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Collection([
            'Collection_Id' => $row['collection_id'],
            'Collection_Name' => $row['collection_name'],
            'Interior_Pic' => $row['interior_pic'],
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'Collection_Id';
    }
}
