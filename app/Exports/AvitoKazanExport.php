<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\AbsolutGres\AbsolutGresScrap;
use App\Models\Altacera\AltaceraTovarAvailable;
use App\Models\AquaFloor;
use App\Models\BauserviceSpb;
use App\Models\Kevis;
use App\Models\Rusplitka\Product as RusplitkaProduct;
use App\Models\Technotile\Product as TechnotileProduct;
use App\Models\LeedoProduct;
use App\Models\NTCeramic\NtCeramicNoImgs;
use App\Models\Primavera;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class AvitoKazanExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    public $foto = '';
    public $phone = '';
    public $name = '';
    public $contact_method = '';
    public $address = '';
    public $add_description = '';
    public $add_description_first = '';

    public function __construct($foto, $phone, $name, $contact_method, $address, $add_description, $add_description_first)
    {
        $this->foto = $foto;
        $this->phone = $phone;
        $this->name = $name;
        $this->contact_method = $contact_method;
        $this->address = $address;
        $this->add_description = $add_description;
        $this->add_description_first = $add_description_first;
    }

    public function bindValue(Cell $cell, $value)
    {

        $cell->setValueExplicit($value, DataType::TYPE_STRING);

        return true;
    }

    public function view(): View
    {
        set_time_limit(120);

        $products = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Laparet'],
            ['Picture', '!=', ''],
            ['RMPrice', '>=', '600'],
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

//        dd($products);

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

//        dd($products);

        if ($this->foto == '') {
            return view('exports.avito-kazan', [
                'products' => $products,
                'phone' => $this->phone,
                'name' => $this->name,
                'contact_method' => $this->contact_method,
                'address' => $this->address,
                'add_description' => $this->add_description,
                'add_description_first' => $this->add_description_first,
            ]);
        } else {
            return view('exports.avito_foto', [
                // 'products' => Product::where([['balanceCount', '>=', 2], ['RMPrice', '>=', '500']])->whereColumn('RMPrice', '>', 'Price')->get()
                'products' => $products,

            ]);
        }

    }
}
