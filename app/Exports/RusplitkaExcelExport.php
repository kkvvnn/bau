<?php

namespace App\Exports;

use App\Models\Rusplitka\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;


class RusplitkaExcelExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'code',
            'collection_id',
            'picture',
            'url',
            'external_id',
            'Название',
            'Артикул',
            'Свойство',
            'Длина',
            'Ширина',
            'Ед.измерения',
            'currency',
            'Вес',
            'Штук в упаковке',
            'Кв.м. в упаковке',
            'Толщина',
            'Поверхность',
            'Страна производства',
            'Бренд',
            'Цена ОПТ',
            'Цена РРЦ',
            'Склад Люберцы',
            'Склад Люберцы резерв',
            'Склад Бронницы',
            'Склад Бронницы резерв',
            'Общий остаток',
            'created',
            'updated',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
//            'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
//            'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'D' => 20,
            'E' => 20,
        ];
    }

}
