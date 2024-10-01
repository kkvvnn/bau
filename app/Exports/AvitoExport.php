<?php

namespace App\Exports;

use App\Models\Altacera\AltaceraTovarAvailable;
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
use App\Models\Technotile\Product as TechnotileProduct;
use App\Models\LeedoProduct;
use App\Models\NTCeramic\NtCeramicNoImgs;
use App\Models\Product;
use App\Traits\Avito\ExportConstruct;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class AvitoExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    use ExportConstruct;

    public function view(): View
    {
        set_time_limit(180);

//      ==================BAUSERVIS====================
        $products = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', '!=', 'Kerama Marazzi'],
            ['Producer_Brand', '!=', 'Шахтинская плитка'],
            ['Producer_Brand', '!=', ''],
            ['Element_code', '!=', 'х9999286854'],
            ['Element_code', '!=', 'х9999221101'],
            ['Element_code', '!=', 'х9999278638'],
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],
            ['balance', 1],
            ['RMPrice', '>=', '650'],
            ['RMPrice', '!=', ''],
            ['Picture', '!=', ''],
        ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->get();

        $blaze = Product::where([['Element_Code', 'х9999293160']])->get();      //blaze silver 60x120

        $kerama_marazzi = Product::where([['GroupProduct', '01 Плитка'],
            ['Producer_Brand', '=', 'Kerama Marazzi'],
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],
            ['balance', 1],
            ['RMPrice', '>=', '650'],
            ['RMPrice', '!=', ''],
            ['Picture', '!=', ''],
        ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->get();

//        $products = $products->merge($kerama_marazzi);  // KERAMA-MARAZZI NO/OFF
        $products = $products->merge($blaze);

//      ==================GOLITSYNO====================
        $golitsyno_duplicate = ['х9999275874'];

//      ==================PRIMAVERA====================
        $primavera = PrimaveraNew::whereHas('balance')
            ->whereHas('price')
            ->get();

//      =================ABSOLUT-GRES====================
//        $absolut_gres = AbsolutGresScrap::all();
        $absolut_gres = [];

//      ===================LEEDO===================
        $leedo = LeedoProduct::where([
            ['Sklad_Msk_LeeDo', '>', 0],
            ['Category', 'like', 'Мозаика/%'],
            ['System_ID', '!=', '00-00003849'],
            ['System_ID', '!=', '00-00002578'],
            ])
            ->orWhere([
                ['Sklad_SPb_LeeDo', '>', 0],
                ['Category', 'like', 'Мозаика/%'],
                ['System_ID', '!=', '00-00003849'],
                ['System_ID', '!=', '00-00002578'],
                ])
            ->get();

//      ====================ARTKERA===================
        $altacera = AltaceraTovarAvailable::where([
            ['artikul', '!=', 'PWU09DLM3'],
            ['artikul', '!=', 'GFA114CMT07R'],
            ['artikul', '!=', 'BWA60ALD004'],
            ['artikul', '!=', 'DWU09BNT017'],
            ['artikul', '!=', 'GFA57SLC00L'],
            ['artikul', '!=', 'PWA11ALD1'],
            ['artikul', '!=', 'BWA60ALD404'],
            ['artikul', '!=', 'WT9VIE11'],
            ['artikul', '!=', 'TWU93MGC07R'],
            ['artikul', '!=', 'GFA114TRZ07L'],
            ['artikul', '!=', 'TWU93SNH04R'],
        ])
            ->get()
            ->filter(function (AltaceraTovarAvailable $altaceraTovarAvailable) {
                return $altaceraTovarAvailable->price != null;
            });

//      =================NT-CERAMIC==================
        $ntceramic = NtCeramicNoImgs::all();

//      =================KEVIS==================
        $kevis = Kevis::all();

//      ================RUSPLITKA====================
        $rusplitka = RusplitkaProduct::where([
            ['svoystvo', 'Керамогранит'],
            ['rest_real_free', '!=', 0],
            ['price_rozn', '!=', 0],
        ])
            ->get();

//      ==================TECHNOTILE===================
//        $technotile = TechnotileProduct::where('available', 'true')->get();
        $technotile = [];

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
        $artcenter = Artcenter::where([
            ['brand', 'Art Ceramic'],
            ['moscow_stock', '>=', 2],
            ['image1', '!=', ''],
            ['vendor_code', '!=', 'Spenze Gris 60x120'],
        ])
            ->get();

//      ===================GLOBAL-TILE====================
        $globaltile = GlobalTileNew::where([
            ['brand', 'GlobalTile'],
            ['Picture', '!=', null],
            ['balance', '>=', 0],
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

//      ===================DISCOUNTS==================

        $discounts = Discount::whereAccount('Напольные решения')->get();
        $discounts_all = [];
        foreach ($discounts as $discount) {
            $discounts_all[$discount->name] = ['discount' => $discount->discount, 'additional' => $discount->additional];
        }

        return view('exports.avito.main.main', [
            'products' => $products,
            'golitsyno_duplicate' => $golitsyno_duplicate,
            'primavera' => $primavera,
            'absolut_gres' => $absolut_gres,
            'leedo' => $leedo,
            'altacera' => $altacera,
            'ntceramic' => $ntceramic,
            'kevis' => $kevis,
            'rusplitka' => $rusplitka,
            'technotile' => $technotile,
            'aquafloor' => $aquafloor,
            'pixmosaics' => $pixmosaics,
            'artcenter' => $artcenter,
            'globaltile' => $globaltile,
            'kerranova' => $kerranova,
            'keramopro' => $keramopro,
            'kerabellezza' => $kerabellezza,
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
