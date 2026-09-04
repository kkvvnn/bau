<?php

namespace App\Imports;

use App\Models\Aqua\Aqua;
use App\Models\Aqua\AquaCollection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class AquaImport implements ToModel, WithUpserts, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Aqua([
            'title' => $row['title'],
            'slug' => Str::slug($row['title']),
            'vendor_code' => $row['vendor_code'],
            'brand' => $row['brand'],
            'collection' => $row['collection'],
            'price' => (int)str_replace([' ', ' ₽/м2'], '', $row['price']),
            'old_price' => (int)str_replace([' ', ' ₽/м2'], '', $row['old_price']),
            'unit' => 'м2',
            'size' => $row['size'],
            'fat' => (float)$row['fat'],
            'class' => (int)$row['class'],
            'osnova' => $row['osnova'],
            'verh_sloi' => $row['verh_sloi'],
            'massa_pack' => (float)$row['massa_pack'],
            'vlagostoikost' => $row['vlagostoikost'],
            'decor' => $row['decor'],
            'class_pozhar' => $row['class_pozhar'],
            'meters_in_pallet' => (float)$row['meters_in_pallet'],
            'meters_in_pack' => (float)$row['meters_in_pack'],
            'podlozhka' => $row['podlozhka'],
            'faska' => $row['faska'],
            'niz_sloi' => $row['niz_sloi'],
            'ottenok' => $row['ottenok'],
            'poverhnost' => $row['poverhnost'],
            'teplyi_pol' => $row['teplyi_pol'],
            'protivoskolzhen' => $row['protivoskolzhen'],
            'sred_sloi' => $row['sred_sloi'],
            'country' => $row['country'],
            'textura' => $row['textura'],
            'type_risunka' => $row['type_risunka'],
            'type_soedinen' => $row['type_soedinen'],
            'type_pack' => $row['type_pack'],
            'zashit_sloy' => (float)$row['zashit_sloy'],
            'him_stoikost' => $row['him_stoikost'],
            'count_in_pack' => (int)$row['count_in_pack'],
            'formaldegid' => $row['formaldegid'],
            'link_tovar' => $row['link_tovar'],
            'image' => $row['image'],
        ]);
    }

    public function uniqueBy()
    {
        return 'vendor_code';
    }

}
