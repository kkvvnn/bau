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
        $args = [
            'id',
            'articul',
            'name',
            'price',
            'price_rozn',
            'rest_real_free',
            'brand_name',
            'svoystvo',
            'surface',
            'country_of_origin',
            'size_a',
            'size_b',
            'thickness',
            'unit',
            'currency',
            'weight',
            'in_pack_sht',
            'in_pack_m2',
            'rest_skald_ljubercy',
            'rest_skald_ljubercy_rezerv',
            'rest_skald_bronnicy',
            'rest_skald_bronnicy_rezerv',
            'code',
            'collection_id',
            'picture',
            'url',
            'external_id',
        ];
        return Product::all($args);
    }

    public function headings(): array
    {
        return [
            'id',
            'Артикул',
            'Название',
            'Цена ОПТ',
            'Цена РРЦ',
            'Остаток',
            'Бренд',
            'Свойство',
            'Поверхность',
            'Страна',
            'Длина',
            'Ширина',
            'Толщина',
            'Ед.измерения',
            'currency',
            'Вес',
            'В упаковке штук',
            'В упаковке м2',
            'Склад Люберцы',
            'Склад Люберцы резерв',
            'Склад Бронницы',
            'Склад Бронницы резерв',
            'code',
            'collection_id',
            'picture',
            'url',
            'external_id',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            'F' => ['font' => ['bold' => true]],
            'E' => ['font' => ['bold' => true]],

            // Styling an entire column.
//            'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'D' => 20,
            'E' => 20,
            'G' => 20,
        ];
    }

}
