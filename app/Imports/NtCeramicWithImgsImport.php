<?php

namespace App\Imports;

use App\Models\NTCeramic\NtCeramicWithImgs;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class NtCeramicWithImgsImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NtCeramicWithImgs([
            'title' => $row['title'],
            'vendor_code' => $row['vendor_code'],
            'brand' => $row['brand'],
            'collection' => $row['collection'],
            'color' => $row['color'],
            'type_of_surface' => $row['type_of_surface'],
            'square_in_pack' => $row['square_in_pack'],
            'fat' => $row['fat'],
            'massa_in_pack' => $row['massa_in_pack'],
            'count_in_pack' => $row['count_in_pack'],
            'price' => $row['price'],
            'img1' => $row['img1'],
            'img2' => $row['img2'],
            'img3' => $row['img3'],
            'img4' => $row['img4'],
            'img5' => $row['img5'],
            'img6' => $row['img6'],
            'img7' => $row['img7'],
            'img8' => $row['img8'],
            'img9' => $row['img9'],
            'img10' => $row['img10'],
            'img11' => $row['img11'],
            'img12' => $row['img12'],
            'img13' => $row['img13'],
            'img14' => $row['img14'],
            'img15' => $row['img15'],
            'img16' => $row['img16'],
            'img17' => $row['img17'],
            'img18' => $row['img18'],
            'img19' => $row['img19'],
            'img20' => $row['img20'],
            'img21' => $row['img21'],
            'img22' => $row['img22'],
            'img23' => $row['img23'],
            'img24' => $row['img24'],
            'img25' => $row['img25'],
            'img26' => $row['img26'],
            'img27' => $row['img27'],
            'img28' => $row['img28'],
            'img29' => $row['img29'],
            'img30' => $row['img30'],
            'img31' => $row['img31'],
            'img32' => $row['img32'],
            'img33' => $row['img33'],
            'img34' => $row['img34'],
            'img35' => $row['img35'],
            'img36' => $row['img36'],
            'img37' => $row['img37'],
            'img38' => $row['img38'],
            'img39' => $row['img39'],
            'img40' => $row['img40'],
            'img41' => $row['img41'],
            'img42' => $row['img42'],
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
