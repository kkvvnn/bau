<?php

namespace App\Exports;

use App\Models\Altacera\AltaceraTovarAvailable;
use App\Models\ArtCentreNew;
use App\Models\Artkera\ArtkeraTovarAvailable;
use App\Models\AquaFloor;
use App\Models\Artcenter;
use App\Models\Azario;
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
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],
            ['balanceCount', '>=', 10],
            ['RMPrice', '>=', 1000],
            ['RMPrice', '!=', ''],
            ['Picture', '!=', ''],
        ])
            ->where(function (Builder $query) {
                $query->where('Producer_Brand', 'Laparet');
                $query->orWhere('Producer_Brand', 'Ceradim');
            })
            ->whereColumn('RMPrice', '>', 'Price')
            ->get()
            ->filter(function (Product $product) {
                $length = (int)$product->Lenght;
                $height = (int)$product->Height;
                return ($length >= 119 && $length <= 121 && $height >= 59 && $height <= 61)         //60x120
                    || ($length >= 59 && $length <= 61 && $height >= 59 && $height <= 61)           //60x60
                    || ($length >= 79 && $length <= 81 && $height >= 79 && $height <= 81)           //80x80
                    || ($length >= 159 && $length <= 161 && $height >= 79 && $height <= 81)         //80x160
                    || ($length >= 119 && $length <= 121 && $height >= 19 && $height <= 21)         //20x120
//                    || ($length >= 79 && $length <= 81 && $height >= 19 && $height <= 21)           //20x80
//                    || ($length >= 59 && $length <= 61 && $height >= 29 && $height <= 31)           //30x60
//                    || ($length >= 49 && $length <= 51 && $height >= 24 && $height <= 26)           //25x50
//                    || ($length >= 74 && $length <= 76 && $height >= 24 && $height <= 26)           //25x75
//                    || ($length >= 59 && $length <= 61 && $height >= 19 && $height <= 21)           //20x60
//                    || ($length >= 39 && $length <= 41 && $height >= 19 && $height <= 21)           //20x40
                    || ($length >= 59 && $length <= 61 && $height >= 14 && $height <= 16);          //15x60
            });

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
                ['Sklad_Msk_LeeDo', '>', 5],
                ['Category', 'like', 'Мозаика/%'],
                ['System_ID', '!=', '00-00002393'],
            ])
            ->get();


//      ====================ARTKERA===================
        $altacera = ArtkeraTovarAvailable::whereHas('price', function($price) {
                $price->where('price', '>=', 700);
            })
            ->where(function (Builder $query) {
                $stock_min = 10;
                $query->where('moscow', '>=', $stock_min);
                $query->orWhere('moscow_way', '>=', $stock_min);
                $query->orWhere('moscow_reserve', '>=', $stock_min);
                $query->orWhere('moscow_depot_reserve', '>=', $stock_min);
                $query->orWhere('moscow_sale', '>=', $stock_min);
            })
            ->get();

//      =================NT-CERAMIC==================
        $ntceramic = NtCeramicNoImgs::all();


//      ================RUSPLITKA====================
        $rusplitka = RusplitkaProduct::where([
            ['svoystvo', 'Керамогранит'],
            ['rest_real_free', '>=', 10],
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
            ->where('stock', '>=', 2)
            ->get();

//      ===================ARTCENTER====================
        $artcenter = ArtCentreNew::where([
            ['brand', 'Art Ceramic'],
            ['moscow', '>=', 10],
            ['code', '!=', 'ЦБ-00043906'],
        ])
            ->get();

//      ===================GLOBAL-TILE====================
        $globaltile = GlobalTileNew::where([
            ['brand', 'GlobalTile'],
            ['Picture', '!=', ''],
            ['balance', '>', 10],
            ['vendor_code', '!=', 'GT60601903MR'],
        ])
            ->get();

//      ===================KERRANOVA====================
        $kerranova = Kerranova::whereHas('props', function ($props) {
            $props->where('balance', '>=', 10);
        })
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

        //==================AZARIO==================
        $azario = Azario::whereHas('props', function ($query) {
            $query->where('price', '!=', 0);
            $query->where('stock', '!=', 0);
        })
            ->get();


//      ===================DISCOUNTS==================

        $discounts = Discount::whereAccount('Напольные решения')->get();
        $discounts_all = [];
        foreach ($discounts as $discount) {
            $discounts_all[$discount->name] = ['discount' => $discount->discount, 'additional' => $discount->additional];
        }

        $discounts_all['Azario'] = [
            'discount' => 10,
            'additional' => 'По умолчанию',
        ];

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
            'azario' => $azario,
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
