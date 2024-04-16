<?php

namespace App\Exports;

use App\Models\AvitoTwoExcel;
use App\Models\Empero;
use App\Models\PixmosaicNew;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

use App\Models\Product;
use App\Models\Collection;

class AvitoLaparetExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
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

    public function bindValue(Cell $cell, $value): bool
    {
        $cell->setValueExplicit($value, DataType::TYPE_STRING);
        return true;
    }

    public function view(): View
    {
        set_time_limit(90);

//      =================LAPARET-COLLECTIONS======================
        $laparets = Product::where('GroupProduct', '=', '01 Плитка')
            ->where('RMPrice', '>=', 700)
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
                    || ($length >= 119 && $length <= 121 && $height >= 19 && $height <= 21);        //20x120
            });

//        dd($laparets);

//      ---------------------OLD---------------------
        $olds = AvitoTwoExcel::all();

        return view('exports.avito-laparet', [
            'laparets' => $laparets,
            'olds' => $olds,
            'phone' => $this->phone,
            'name' => $this->name,
            'contact_method' => $this->contact_method,
            'address' => $this->address,
            'add_description' => $this->add_description,
            'add_description_first' => $this->add_description_first,
        ]);
    }
}
