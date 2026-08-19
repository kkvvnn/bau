<?php

namespace App\Exports;

use App\Models\Belleza;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BellezaFileExport extends DefaultValueBinder implements FromView, WithCustomValueBinder, ShouldAutoSize
{
    public function bindValue(Cell $cell, $value)
    {

        $cell->setValueExplicit($value, DataType::TYPE_STRING);

        return true;
    }

    public function view(): View
    {
        $products = Belleza::where('price', '!=', 0)
            ->get();

        return view('exports.belleza-file', [
            'products' => $products,
        ]);
    }
}
