<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\AbsolutGres\AbsolutGresScrap;
use App\Models\Altacera\AltaceraTovarAvailable;
use App\Models\LeedoProduct;
use App\Models\Primavera;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class AvitoExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    public $foto = '';

    public function __construct($foto)
    {
        $this->foto = $foto;
    }

    public function bindValue(Cell $cell, $value)
    {

        $cell->setValueExplicit($value, DataType::TYPE_STRING);

        return true;
    }

    public function view(): View
    {
        set_time_limit(90);

        $products_all = Product::where([['Name', 'not like', '%екор%'], ['Name', 'not like', '%ставк%'], ['Name', 'not like', '%ступен%'], ['Name', 'not like', '%пецэлем%'], ['balance', 1], ['RMPrice', '>=', '500']])->whereColumn('RMPrice', '>', 'Price')->get();
        $products_cersanit_except = Product::where([['Producer_Brand', 'Cersanit'], ['balanceCount', '<', 20]])->get();
        // dd($products_cersanit_except);
        // dd($products_all);
        $ids_cersanit_except = [];
        foreach ($products_cersanit_except as $pr) {
            $ids_cersanit_except[] = $pr->id;
        }

        // dd($ids_cersanit_except);

        $products = $products_all->except($ids_cersanit_except);

//        $tiaki_green_60x120 = Product::where('Name', 'like', 'Tiaki Green Керамогранит 60x120 Полированный')->get();
//        $dalim_mint = Product::where('Name', 'like', 'Dalim Mint Керамогранит 60x60 Полированный')->get();
//        dd($dalim_mint);
//        $products->add($tiaki_green_60x120[0]);
//        $products->add($dalim_mint[0]);
        // dd($products);
//      ==============================================
        $primavera = Primavera::all();
//      ==============================================
        $absolut_gres = AbsolutGresScrap::all();
//      ==============================================
//        $leedo = LeedoProduct::where('Sklad_Msk_LeeDo', '>', 0)->orWhere('Sklad_SPb_LeeDo', '>', 0)->get();
        $leedo = LeedoProduct::where([['Sklad_Msk_LeeDo', '>', 0], ['Category', 'like', 'Мозаика/%']])->orWhere([['Sklad_SPb_LeeDo', '>', 0], ['Category', 'like', 'Мозаика/%']])->get();
//      ==============================================
        $altacera = AltaceraTovarAvailable::where('artikul', '!=', 'PWU09DLM3')->get();
//      ==============================================

        if ($this->foto == '') {
            return view('exports.avito', [
                // 'products' => Product::where([['balanceCount', '>=', 2], ['RMPrice', '>=', '500']])->whereColumn('RMPrice', '>', 'Price')->get()
                'products' => $products,
                'primavera' => $primavera,
                'absolut_gres' => $absolut_gres,
                'leedo' => $leedo,
                'altacera' => $altacera,
            ]);
        } else {
            return view('exports.avito_foto', [
                // 'products' => Product::where([['balanceCount', '>=', 2], ['RMPrice', '>=', '500']])->whereColumn('RMPrice', '>', 'Price')->get()
                'products' => $products,
                'primavera' => $primavera,
                'absolut_gres' => $absolut_gres,
                'leedo' => $leedo,
                'altacera' => $altacera,
            ]);
        }

    }
}
