<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

use App\Models\Product;
use App\Models\Collection;

class AvitoTwoExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
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

//      =================COLLECTIONS-LIST======================
        $laparets = Product::where([['GroupProduct', '01 Плитка'], ['Producer_Brand', 'Laparet'], ['Name', 'not like', '%ставк%'], ['Name', 'not like', '%пецэлем%'], ['balance', 1], ['RMPrice', '>=', '500'], ['Picture', '!=', '']])->whereColumn('RMPrice', '>', 'Price')->get();

        $collections_id = [];
        foreach ($laparets as $laparet) {
            $temp = explode(', ', $laparet->Collection_Id);
            $collections_id = array_merge($collections_id, $temp);
        }

        $collections_id = array_unique($collections_id);

        $collections_unique = Collection::whereIn('Collection_Id', $collections_id)->get();

//      ===================COLLECTIONS-LIST-END========================

        return view('exports.avito-two', [
            'collections' => $collections_unique,
            'phone' => $this->phone,
            'name' => $this->name,
            'contact_method' => $this->contact_method,
            'address' => $this->address,
            'add_description' => $this->add_description,
            'add_description_first' => $this->add_description_first,
        ]);
    }
}
