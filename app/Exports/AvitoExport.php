<?php

namespace App\Exports;

use App\Models\Altacera\AltaceraTovarAvailable;
use App\Models\ArtCentreNew;
use App\Models\Artkera\ArtkeraTovarAvailable;
use App\Models\AquaFloor;
use App\Models\Artcenter;
use App\Models\Discount;
use App\Models\GlobalTileNew;
use App\Models\Kerabellezza2;
use App\Models\Keramopro;
use App\Models\Kerranova;
use App\Models\Kevis;
use App\Models\PixmosaicNew;
use App\Models\PrimaveraNew;
use App\Models\Rusplitka\Product as RusplitkaProduct;
use App\Models\Skalla;
use App\Models\Technotile\Product as TechnotileProduct;
use App\Models\LeedoProduct;
use App\Models\NTCeramic\NtCeramicNoImgs;
use App\Models\Product;
use App\Traits\Avito\ExportConstruct;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class AvitoExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    use ExportConstruct;

    public function view(): View
    {
        set_time_limit(300);

//      ==================BAUSERVIS====================

        $laparets = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Element_code', '!=', 'х9999286854'],
            ['Element_code', '!=', 'х9999221101'],
            ['Element_code', '!=', 'х9999278638'],
            ['Element_code', '!=', 'х9999213228'],
            ['Element_code', '!=', 'х9999308135'],
            ['Element_code', '!=', 'х9999308136'],
            ['Element_code', '!=', 'х9999308143'],
            ['Element_code', '!=', 'х9999308148'],
            ['Element_code', '!=', 'х9999308149'],
            ['Element_code', '!=', 'х9999308150'],
            ['Element_code', '!=', 'х9999213203'],
            ['Element_code', '!=', 'х9999299093'],
            ['Element_code', '!=', 'х9999213204'],
            ['Element_code', '!=', 'х9999294554'],
            ['Element_code', '!=', 'х9999219655'],
            ['Element_code', '!=', 'х9999219679'],
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],
            ['balanceCount', '>=', 1],
            ['RMPrice', '>=', 900],
            ['RMPrice', '!=', ''],
            ['Picture', '!=', ''],
        ])
            ->where(function (Builder $query) {
                $query->where('Producer_Brand', 'Laparet');
                $query->orWhere('Producer_Brand', 'Ceradim');
            })
            ->whereColumn('RMPrice', '>', 'Price')
            ->get();


//      ==================PRIMAVERA====================
        $primavera = PrimaveraNew::whereHas('balance')
            ->whereHas('price')
            ->where(column: function (Builder $query) {
                $query->orWhere('size_format',  '60x120 см');
                $query->orWhere('size_format',  '60x60 см');
            })
            ->get();

//      ===================LEEDO===================
        $leedo = LeedoProduct::where([
                ['Sklad_Msk_LeeDo', '>', 0],
                ['Category', 'like', 'Мозаика/%'],
                ['System_ID', '!=', '00-00002393'],
            ])
            ->get();


//      ====================ARTKERA===================
        $altacera = ArtkeraTovarAvailable::where([
//            ['sale', 0],
            ['artikul', '!=', 'DW11VST00'],
            ['artikul', '!=', 'TWU2550MLN10'],
            ['artikul', '!=', 'TWU2550MLN30'],
        ])
            ->where(function (Builder $query) {
                $query->where('moscow', '>=', 1);
                $query->orWhere('moscow_way', '>=', 1);
                $query->orWhere('moscow_reserve', '>=', 1);
                $query->orWhere('moscow_depot_reserve', '>=', 1);
                $query->orWhere('moscow_sale', '>=', 1);
            })
            ->get();


//      =================NT-CERAMIC==================
        $ntceramic = NtCeramicNoImgs::all();


//      ================RUSPLITKA====================
        $rusplitka = RusplitkaProduct::where([
            ['svoystvo', 'Керамогранит'],
            ['rest_real_free', '!=', 0],
            ['price_rozn', '!=', 0],
            ['brand_name', '!=', 'Best Ceramic'],
        ])
            ->get();


//      ===================AQUAFLOOR====================
        $aquafloor = AquaFloor::where([
            ['title', 'not like', '%Подложка%'],
            ['vendor_code', '!=', 'AF4078NXL'],
        ])
            ->get();

//      ===================PIXMOSAIC====================
        $pixmosaics = PixmosaicNew::where('price', '!=', 0)
            ->where('stock', '!=', '')
            ->get();

//      ===================ARTCENTER====================
        $artcenter = ArtCentreNew::where([
            ['brand', 'Art Ceramic'],
            ['moscow', '>=', 4],
            ['code', '!=', 'ЦБ-00043906'],
        ])
            ->get();

//      ===================GLOBAL-TILE====================
        $globaltile = GlobalTileNew::where([
            ['brand', 'GlobalTile'],
            ['Picture', '!=', ''],
            ['balance', '>', 0],
        ])
            ->get();

//      ===================KERRANOVA====================
        $kerranova = Kerranova::whereHas('props')
            ->get();

//      ===================NOVIN-CERAM==================
        $keramopro = Keramopro::all();

//      ===================KERABELLEZZA==================
        $kerabellezza = Kerabellezza2::where([
            ['type', '!=', 'product'],
            ['image', '!=', ''],
            ['parent_code', '!=', '107073'],
            ['parent_code', '!=', '107072'],
        ])
            ->get();
        $kerabellezza = [];

        //==================SKALLA==================
        $skalla = Skalla::whereHas('price')
            ->get();

//      ===================DISCOUNTS==================

        $discounts = Discount::whereAccount('Напольные решения')->get();
        $discounts_all = [];
        foreach ($discounts as $discount) {
            $discounts_all[$discount->name] = ['discount' => $discount->discount, 'additional' => $discount->additional];
        }

        return view('exports.avito.main.main', [
            'products' => $laparets,
            'primavera' => $primavera,
            'leedo' => $leedo,
            'altacera' => $altacera,
            'ntceramic' => $ntceramic,
            'rusplitka' => $rusplitka,
            'aquafloor' => $aquafloor,
            'pixmosaics' => $pixmosaics,
            'artcenter' => $artcenter,
            'globaltile' => $globaltile,
            'kerranova' => $kerranova,
            'keramopro' => $keramopro,
            'kerabellezza' => $kerabellezza,
            'skalla' => $skalla,
            'phone' => $this->phone,
            'name' => $this->name,
            'contact_method' => $this->contact_method,
            'address' => $this->address,
            'add_description_first' => $this->add_description_first,
            'add_description' => $this->add_description_last,
            'discounts' => $discounts_all,
        ]);
    }
}
