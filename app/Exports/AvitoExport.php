<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class AvitoExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    public function bindValue(Cell $cell, $value)
    {

        $cell->setValueExplicit($value, DataType::TYPE_STRING);

        return true;
    }

    public function view(): View
    {
        return view('exports.avito', [
            // 'products' => Product::where([['balanceCount', '>=', 2], ['RMPrice', '>=', '500']])->whereColumn('RMPrice', '>', 'Price')->get()
            'products' => Product::where([['balanceCount', '>=', 2], ['RMPrice', '>=', '500']])->whereColumn('RMPrice', '>', 'Price')->get()
        ]);
    }
}
