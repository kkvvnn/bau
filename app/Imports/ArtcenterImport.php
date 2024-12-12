<?php

namespace App\Imports;

use App\Models\Artcenter;
use App\Models\ArtCentreNew;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;

class ArtcenterImport implements ToModel, WithUpserts, SkipsEmptyRows
{
    use Importable;

    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        return new ArtCentreNew([
            'code' => str_replace('#NULL!', '', $row[0]),
            'vendor_code' => str_replace('#NULL!', '', $row[1]),
            'title' => str_replace('#NULL!', '', $row[2]),
            'slug' => STR::slug(str_replace('#NULL!', '', $row[2])),
            'brand' => str_replace('#NULL!', '', $row[3]),
            'collection' => str_replace('#NULL!', '', $row[4]),
            'material' => str_replace('#NULL!', '', $row[5]),
            'for' => str_replace('#NULL!', '', $row[6]),
            'surface' => str_replace('#NULL!', '', $row[7]),
            'size' => str_replace('#NULL!', '', $row[8]),
            'width' => size_by_name(str_replace('#NULL!', '', $row[8]), 'W'),
//            'length' => (float) explode('x', str_replace('#NULL!', '', $row[8]))[1]??'',
//            'width' => 22,
            'length' => size_by_name(str_replace('#NULL!', '', $row[8]), 'L'),
            'rectified' => str_replace('#NULL!', '', $row[9]),
            'picture_surface' => str_replace('#NULL!', '', $row[10]),
            'style' => str_replace('#NULL!', '', $row[11]),
            'color' => str_replace('#NULL!', '', $row[12]),
            'unit' => str_replace('#NULL!', '', $row[13]),
            'fat' => str_replace('#NULL!', '', $row[14]),
            'square_in_pack' => str_replace('#NULL!', '', $row[15]),
            'images' => $this->images_to_array($row),
            'price' => (int)$row[20],
            'kazan' => (float) str_replace('#NULL!', '', $row[21]),
            'moscow' => (float) str_replace('#NULL!', '', $row[22]),
            'nn' => (float) str_replace('#NULL!', '', $row[23]),
            'samara' => (float) str_replace('#NULL!', '', $row[24]),
            'spb' => (float) str_replace('#NULL!', '', $row[25]),
        ]);
    }

    /**
     * @return string
     */
    public function uniqueBy(): string
    {
        return 'code';
    }


    public function isEmptyWhen(array $row): bool
    {
        $brand = str_replace('#NULL!', '', $row[3]);
        return $brand === '';
    }


    /**
     * @param array $row
     * @return array
     */
    private function images_to_array(array $row): array
    {
        $string_for_delete = 'https://media.artcentre.club/';
        $columns = [
            16,
            17,
            18,
            19,
        ];

        $arr = [];
        foreach ($columns as $column) {
            $row[$column] = str_replace('#NULL!', '', $row[$column]);
            $row[$column] = str_replace('\\', '/', $row[$column]);
            if ($row[$column] != '') {
                $arr[] = str_replace($string_for_delete, '', $row[$column]);
            }
        }

        return $arr;
    }
}
