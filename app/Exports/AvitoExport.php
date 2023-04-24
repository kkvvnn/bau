<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AvitoExport implements FromView
{
    public function view(): View
    {
        return view('exports.avito', [
            // 'products' => Product::where([['balanceCount', '>=', 2], ['RMPrice', '>=', '500']])->whereColumn('RMPrice', '>', 'Price')->get()
            'products' => Product::where([['balanceCount', '>=', 2], ['RMPrice', '>=', '500']])->whereColumn('RMPrice', '>', 'Price')->get()
        ]);
    }
}
