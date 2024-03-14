<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class WoocommerceExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    public function bindValue(Cell $cell, $value)
    {

        $cell->setValueExplicit($value, DataType::TYPE_STRING);

        return true;
    }

    public function view(): View
    {
        $products = Product::where([['Surface', 'Карвинг']])->get();
//        $products = Product::where([['Name', 'like', '%арвин%']])->get();
//        dd($products);

        return view('exports.woocommerce', [
            'products' => $products,
        ]);
    }
}
