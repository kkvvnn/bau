<?php

namespace App\Imports;

use App\Models\Azario;
use App\Models\Kerranova;
use App\Models\PrimaveraNew;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class AzarioImport implements ToModel, WithHeadingRow, WithUpserts
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Azario([
            'vendor_code' => $row['vendor_code'],
            'category' => 'Керамогранит',
            'brand' => $row['brand'],
            'country' => $row['country'],
            'title' => $row['title'],
            'slug' => Str::slug('Azario '.$row['title']),
            'size' => $row['size'],
            'width' => (int) $row['width'],
            'length' => (int) $row['length'],
            'thickness' => (int) $row['thickness'],
            'unit' => 'м2',
            'surface' => $row['surface'],
            'color' => $row['color'],
            'design' => '',
            'images' => $this->images_to_array($row['images']),
//            'images' => json_decode($row['images']),
        ]);
    }

    public function uniqueBy(): string
    {
        return 'vendor_code';
    }

//    /**
//     * @return int
//     */
//    public function startRow(): int
//    {
//        return 2;
//    }

    private function images_to_array(string $str): array
    {
        $arr = [];
        $arr_temp = json_decode($str, true);

        foreach ($arr_temp as $item) {
            $arr[] = $this->url_fix($item['images-src']);
        }

        return $arr;
    }

    private function url_fix(string $str): string
    {
//        return 'https://www.santehcentr.com' . str_replace('114_109_', '1200_1200_', $str);
        return str_replace('114_109_', '1200_1200_', $str);
    }

}
