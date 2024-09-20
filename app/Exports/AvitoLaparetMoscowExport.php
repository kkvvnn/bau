<?php

namespace App\Exports;

use App\Models\AvitoTwoExcel;
use App\Traits\Avito\ExportConstruct;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use App\Models\Product;

class AvitoLaparetMoscowExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    use ExportConstruct;

    public function view(): View
    {
        set_time_limit(90);

        $laparets = Product::where('GroupProduct', '=', '01 Плитка')
            ->where('RMPrice', '>=', 700)
            ->where('Element_Code', '!=', 'х9999278638')
            ->where('Picture', '!=', '')
            ->where('Producer_Brand', '=', 'Laparet')
            ->whereColumn('RMPrice', '>', 'Price')
            ->get()
            ->filter(function (Product $product) {
                return $product->balance == 1
                    || (isset($product->kzn->balance) && $product->kzn->balance == 1)
                    || (isset($product->spb->balance) && $product->spb->balance == 1);
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
                    || ($length >= 59 && $length <= 61 && $height >= 14 && $height <= 16);          //15x60
            });

//  ===========================OLD=================================
        $olds = AvitoTwoExcel::whereIn('AvitoId', [
            '2925091517',
            '2797125306',
            '2764970303',
            '2765196069',
            '2765290501',
            '2924855920',
            '2957716643',
            '2829595083',
            '2765302371',
            '2797087245',
            '2765747168',
            '2765086357',
            '2797419166',
        ])
        ->get();

        return view('exports.avito.laparet-moscow', [
            'laparets' => $laparets,
            'olds' => $olds,
            'phone' => $this->phone,
            'name' => $this->name,
            'contact_method' => $this->contact_method,
            'address' => $this->address,
            'add_description_first' => $this->add_description_first,
            'add_description' => $this->add_description_last,
        ]);
    }
}
