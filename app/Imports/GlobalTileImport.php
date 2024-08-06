<?php

namespace App\Imports;

use App\Models\GlobalTile;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class GlobalTileImport implements ToModel, WithHeadingRow, WithUpserts
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GlobalTile([
            'code' => $row['Код'],
            'title' => $row['Наименование'],
            'vn_id' => $row['ID'],
            'vendor_code' => $row['Артикул'],
            'brand' => $row['Бренд'],
            'collection' => $row['Коллекция'],
            'length' => $row['Длина'],
            'width' => $row['Ширина'],
            'frost_resistance' => $row['Морозостойкость'],
            'count_in_pack' => $row['ШтукВКоробке'],
            'meters_in_pack' => $row['МетровКвадратныхВКоробке'],
            'material' => $row['Материал'],
            'for' => $row['Назначение'],
            'type' => $row['НаименованиеЭлемента'],
            'design' => $row['Рисунок'],
            'format_collection' => $row['ФорматКоллекции'],
            'country' => $row['СтранаПроизводства'],
            'surface' => $row['ТипПоверхности'],
            'unit' => $row['БазоваяЕдиница'],
            'massa_pack' => $row['ВесКоробки'],
            'fat' => $row['Толщина'],
            'color' => str_replace('!', '', $row['Цвет']),
            'balance' => $row['ОстатокОсновной'],
            'price' => $row['ЦенаРРЦ'],
            'status' => $row['Статус'],
            'effects' => $row['Эффекты'],
            'rectificat' => $row['Ректификация'],
            'relief' => $row['Рельеф'],
            'image_collection' => $row['РисунокКоллекция'],
            'images' => array_filter(array(
                $row['РисунокНомкенклатуры_1'],
                $row['РисунокНомкенклатуры_2'],
                $row['РисунокНомкенклатуры_3'],
                $row['РисунокНомкенклатуры_4'],
                $row['РисунокНомкенклатуры_5'],
                $row['РисунокНомкенклатуры_6'],
                $row['РисунокНомкенклатуры_7'],
                $row['РисунокНомкенклатуры_8'],
                $row['РисунокНомкенклатуры_9'],
                $row['РисунокНомкенклатуры_10'],
                $row['РисунокНомкенклатуры_11'],
                $row['РисунокНомкенклатуры_12'],
                $row['РисунокНомкенклатуры_13'],
                $row['РисунокНомкенклатуры_14'],
                $row['РисунокНомкенклатуры_15'],
                $row['РисунокНомкенклатуры_16'],
                $row['РисунокНомкенклатуры_17'],
                $row['РисунокНомкенклатуры_18'],
                $row['РисунокНомкенклатуры_19'],
                $row['РисунокНомкенклатуры_20'],
                $row['РисунокНомкенклатуры_21'],
                $row['РисунокНомкенклатуры_22'],
                $row['РисунокНомкенклатуры_23'],
                $row['РисунокНомкенклатуры_24'],
                )),
        ]);
    }

    public function uniqueBy()
    {
        return 'vendor_code';
    }
}
