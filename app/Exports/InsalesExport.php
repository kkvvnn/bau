<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class InsalesExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    private $type;
    private $catalog;

    public function __construct($type, $catalog)
    {
        $this->type = $type;
        $this->catalog = $catalog;
    }

    public function bindValue(Cell $cell, $value)
    {

        $cell->setValueExplicit($value, DataType::TYPE_STRING);

        return true;
    }

    public function view(): View
    {
        switch ($this->type) {
            case 'laparet-carving':
//                $products = Product::where([['Surface', 'Карвинг'], ['balanceCount', '>=', 0]])->get();
                $products = Product::where([['GroupProduct', '01 Плитка'],
                    ['Producer_Brand', '!=', 'Kerama Marazzi'],
                    ['Surface', 'Карвинг'],['Name', 'not like', '%ставк%'],
                    ['Name', 'not like', '%ступен%'],
                    ['Name', 'not like', '%пецэлем%'],
                    ['balance', 1],
                    ['RMPrice', '>=', '500'],
                    ['Picture', '!=', '']])
                    ->whereColumn('RMPrice', '>', 'Price')
                    ->get();
                break;
            case 'laparet-wood':
                $products = Product::where([['GroupProduct', '01 Плитка'],
                    ['Producer_Brand', '!=', 'Kerama Marazzi'],
                    ['DesignValue', 'Дерево'],['Name', 'not like', '%ставк%'],
                    ['Name', 'not like', '%ступен%'],
                    ['Name', 'not like', '%пецэлем%'],
                    ['balance', 1],
                    ['RMPrice', '>=', '500'],
                    ['Picture', '!=', '']])
                    ->whereColumn('RMPrice', '>', 'Price')
                    ->get();
                break;
        }

        return view('exports.insales', [
            'products' => $products,
            'catalog' => $this->catalog,
        ]);
    }
}
