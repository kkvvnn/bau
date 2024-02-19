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
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class AvitoSpbExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
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
        set_time_limit(90);

        $products = BauserviceSpb::where([['GroupProduct', '01 Плитка'],['Producer_Brand', '!=', 'Kerama Marazzi'],['Name', 'not like', '%ставк%'], ['Name', 'not like', '%ступен%'], ['Name', 'not like', '%пецэлем%'], ['balance', 1], ['RMPrice', '>=', '500'], ['Picture', '!=', '']])->whereColumn('RMPrice', '>', 'Price')->get();

//dd($products[0]);
        if ($this->foto == '') {
            return view('exports.avito-spb', [
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
