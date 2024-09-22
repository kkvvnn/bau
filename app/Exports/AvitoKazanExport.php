<?php

namespace App\Exports;

use App\Models\Product;
use App\Traits\Avito\ExportConstruct;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class AvitoKazanExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    use ExportConstruct;

    public function view(): View
    {
        set_time_limit(120);

        $products = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Laparet'],
            ['Picture', '!=', ''],
            ['RMPrice', '>=', '600'],
            ['Element_Code', '!=', 'х9999278638'],
        ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->get()
            ->filter(function (Product $product) {
                return $product->balance == 1
                    || (isset($product->kzn->balance) && $product->kzn->balance == 1);
            })
            ->filter(function (Product $product) {
                $length = (int)$product->Lenght;
                $height = (int)$product->Height;
                return ($length >= 119 && $length <= 121 && $height >= 59 && $height <= 61)         //60x120
                    || ($length >= 59 && $length <= 61 && $height >= 59 && $height <= 61)           //60x60
                    || ($length >= 79 && $length <= 81 && $height >= 79 && $height <= 81)           //80x80
                    || ($length >= 159 && $length <= 161 && $height >= 79 && $height <= 81)         //80x160
                    || ($length >= 119 && $length <= 121 && $height >= 19 && $height <= 21)         //20x120
                    || ($length >= 79 && $length <= 81 && $height >= 19 && $height <= 21)           //20x80
                    || ($length >= 59 && $length <= 61 && $height >= 29 && $height <= 31)           //30x60
                    || ($length >= 49 && $length <= 51 && $height >= 24 && $height <= 36)           //25x50
                    || ($length >= 74 && $length <= 76 && $height >= 24 && $height <= 36)           //25x75
                    || ($length >= 59 && $length <= 61 && $height >= 19 && $height <= 21)           //20x60
                    || ($length >= 39 && $length <= 41 && $height >= 19 && $height <= 21)           //20x40
                    || ($length >= 59 && $length <= 61 && $height >= 14 && $height <= 16);          //15x60
            });

        $ceradim = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Ceradim'],
            ['Picture', '!=', ''],
        ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->get()
            ->filter(function (Product $product) {
                return isset($product->kzn->balance) && $product->kzn->balance == 1;
            });

        $products = $products->merge($ceradim);

        return view('exports.avito.laparet-kazan', [
            'products' => $products,
            'phone' => $this->phone,
            'name' => $this->name,
            'contact_method' => $this->contact_method,
            'address' => $this->address,
            'add_description' => $this->add_description_last,
            'add_description_first' => $this->add_description_first,
        ]);
    }
}
