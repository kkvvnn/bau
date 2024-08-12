<?php

namespace App\Imports;

use App\Models\GlobalTile;
use App\Models\GlobalTileNew;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class PrimaveraNewImport implements ToModel, WithHeadingRow, WithUpserts
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GlobalTileNew([
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
//            'images' => array_filter(array(
//                $row['РисунокНомкенклатуры_1'],
//                $row['РисунокНомкенклатуры_2'],
//                $row['РисунокНомкенклатуры_3'],
//                $row['РисунокНомкенклатуры_4'],
//                $row['РисунокНомкенклатуры_5'],
//                $row['РисунокНомкенклатуры_6'],
//                $row['РисунокНомкенклатуры_7'],
//                $row['РисунокНомкенклатуры_8'],
//                $row['РисунокНомкенклатуры_9'],
//                $row['РисунокНомкенклатуры_10'],
//                $row['РисунокНомкенклатуры_11'],
//                $row['РисунокНомкенклатуры_12'],
//                $row['РисунокНомкенклатуры_13'],
//                $row['РисунокНомкенклатуры_14'],
//                $row['РисунокНомкенклатуры_15'],
//                $row['РисунокНомкенклатуры_16'],
//                $row['РисунокНомкенклатуры_17'],
//                $row['РисунокНомкенклатуры_18'],
//                $row['РисунокНомкенклатуры_19'],
//                $row['РисунокНомкенклатуры_20'],
//                $row['РисунокНомкенклатуры_21'],
//                $row['РисунокНомкенклатуры_22'],
//                $row['РисунокНомкенклатуры_23'],
//                $row['РисунокНомкенклатуры_24'],
//                )),
            'Picture' => $row['РисунокНомкенклатуры_1'],
            'Picture2' => $row['РисунокНомкенклатуры_2'],
            'Picture3' => $row['РисунокНомкенклатуры_3'],
            'Picture4' => $row['РисунокНомкенклатуры_4'],
            'Picture5' => $row['РисунокНомкенклатуры_5'],
            'Picture6' => $row['РисунокНомкенклатуры_6'],
            'Picture7' => $row['РисунокНомкенклатуры_7'],
            'Picture8' => $row['РисунокНомкенклатуры_8'],
            'Picture9' => $row['РисунокНомкенклатуры_9'],
            'Picture10' => $row['РисунокНомкенклатуры_10'],
            'Picture11' => $row['РисунокНомкенклатуры_11'],
            'Picture12' => $row['РисунокНомкенклатуры_12'],
            'Picture13' => $row['РисунокНомкенклатуры_13'],
            'Picture14' => $row['РисунокНомкенклатуры_14'],
            'Picture15' => $row['РисунокНомкенклатуры_15'],
            'Picture16' => $row['РисунокНомкенклатуры_16'],
            'Picture17' => $row['РисунокНомкенклатуры_17'],
            'Picture18' => $row['РисунокНомкенклатуры_18'],
            'Picture19' => $row['РисунокНомкенклатуры_19'],
            'Picture20' => $row['РисунокНомкенклатуры_20'],
            'Picture21' => $row['РисунокНомкенклатуры_21'],
            'Picture22' => $row['РисунокНомкенклатуры_22'],
            'Picture23' => $row['РисунокНомкенклатуры_23'],
            'Picture24' => $row['РисунокНомкенклатуры_24'],
        ]);
    }

    public function uniqueBy()
    {
        return 'vendor_code';
    }
}
