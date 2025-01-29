<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\AbsolutGres\AbsolutGresScrap;
use App\Models\Altacera\AltaceraTovarAvailable;
use App\Models\AquaFloor;
use App\Models\ArtCentreNew;
use App\Models\Artkera\ArtkeraTovarAvailable;
use App\Models\BauserviceSpb;
use App\Models\GlobalTileNew;
use App\Models\Kevis;
use App\Models\PrimaveraNew;
use App\Models\Rusplitka\Product as RusplitkaProduct;
use App\Models\Technotile\Product as TechnotileProduct;
use App\Models\LeedoProduct;
use App\Models\NTCeramic\NtCeramicNoImgs;
use App\Models\Primavera;
use App\Models\Product;
use App\Traits\Avito\ExportConstruct;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class AvitoMillenniumExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    use ExportConstruct;

    public function view(): View
    {
//       ----- BAUSERVICE-SPB -----
        $bauservice_spb = Product::with('spb')
            ->whereHas('spb', function ($spb) {
                $spb->where('balanceCount', '>', 1);
            })
            ->where(function (Builder $query) {
                $query->where('Producer_Brand', 'Laparet');
                $query->orWhere('Producer_Brand', 'Ceradim');
            })
            ->where([
                ['GroupProduct', '01 Плитка'],
                ['RMPrice', '>=', '900'],
                ['Picture', '!=', ''],
                ['Element_code', '!=', 'х9999294554'],
            ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->get();

//        ----- ARTKERA -----
        $artkera = ArtkeraTovarAvailable::where([
            ['artikul', '!=', 'DW11VST00'],
            ['artikul', '!=', 'TWU2550MLN10'],
            ['artikul', '!=', 'TWU2550MLN20'],
            ['artikul', '!=', 'TWU2550MLN30'],
            ['artikul', '!=', 'WT15EXT00R'],
        ])
            ->get();

//        $artkera = [];

//        ----- ART CERAMIC -----
        $price_min = 1000;

        $artCeramic = ArtCentreNew::where('brand', 'Art Ceramic')
//            ->where('vendor_code', '!=', 'Spenze Gris 60x120')
            ->where('price', '>=', $price_min)
            ->where(column: function (Builder $query) {
                $stock = 1;
                $query->orWhere('moscow', '>', $stock);
                $query->orWhere('kazan', '>', $stock);
                $query->orWhere('nn', '>', $stock);
                $query->orWhere('samara', '>', $stock);
                $query->orWhere('spb', '>', $stock);
            })
            ->whereJsonLength('images', '>', 0)
            ->get();

        $cubeCeramica = ArtCentreNew::where('brand', 'Cube Ceramica')
            ->where('price', '>=', $price_min)
            ->where(column: function (Builder $query) {
                $stock = 1;
                $query->orWhere('moscow', '>', $stock);
                $query->orWhere('kazan', '>', $stock);
                $query->orWhere('nn', '>', $stock);
                $query->orWhere('samara', '>', $stock);
                $query->orWhere('spb', '>', $stock);
            })
            ->whereJsonLength('images', '>', 0)
            ->get();

        $idalgo = ArtCentreNew::where('brand', 'Idalgo')
            ->where('price', '>=', $price_min)
            ->where(column: function (Builder $query) {
                $stock = 1;
                $query->orWhere('moscow', '>', $stock);
                $query->orWhere('kazan', '>', $stock);
                $query->orWhere('nn', '>', $stock);
                $query->orWhere('samara', '>', $stock);
                $query->orWhere('spb', '>', $stock);
            })
            ->whereJsonLength('images', '>', 0)
            ->get();

        $qua = ArtCentreNew::where('brand', 'Qua')
            ->where('price', '>=', $price_min)
            ->where(column: function (Builder $query) {
                $stock = 1;
                $query->orWhere('moscow', '>', $stock);
                $query->orWhere('kazan', '>', $stock);
                $query->orWhere('nn', '>', $stock);
                $query->orWhere('samara', '>', $stock);
                $query->orWhere('spb', '>', $stock);
            })
            ->whereJsonLength('images', '>', 0)
            ->get();

        $dako = ArtCentreNew::where('brand', 'DAKO')
            ->where('price', '>=', $price_min)
            ->where(column: function (Builder $query) {
                $stock = 1;
                $query->orWhere('moscow', '>', $stock);
                $query->orWhere('kazan', '>', $stock);
                $query->orWhere('nn', '>', $stock);
                $query->orWhere('samara', '>', $stock);
                $query->orWhere('spb', '>', $stock);
            })
            ->whereJsonLength('images', '>', 0)
            ->get();

        $graniteya = ArtCentreNew::where('brand', 'ГРАНИТЕЯ')
            ->where('price', '>=', $price_min)
            ->where(column: function (Builder $query) {
                $stock = 1;
                $query->orWhere('moscow', '>', $stock);
                $query->orWhere('kazan', '>', $stock);
                $query->orWhere('nn', '>', $stock);
                $query->orWhere('samara', '>', $stock);
                $query->orWhere('spb', '>', $stock);
            })
            ->whereJsonLength('images', '>', 0)
            ->get();

        $primeCeramics = ArtCentreNew::where('brand', 'Prime Ceramics')
            ->where('price', '>=', $price_min)
            ->where(column: function (Builder $query) {
                $stock = 1;
                $query->orWhere('moscow', '>', $stock);
                $query->orWhere('kazan', '>', $stock);
                $query->orWhere('nn', '>', $stock);
                $query->orWhere('samara', '>', $stock);
                $query->orWhere('spb', '>', $stock);
            })
            ->where('vendor_code', '!=', 'GRP6060OC-MJ')
            ->whereJsonLength('images', '>', 0)
            ->get();

//      ==================PRIMAVERA====================
        $primavera = PrimaveraNew::whereHas('balance')
            ->whereHas('price')
            ->get();


//      ============KERAMA-MARAZZI================
        $kerama_marazzi = Product::where([
            ['GroupProduct', '01 Плитка'],
//            ['Producer_Brand', 'Kerama Marazzi'],
            ['Picture', '!=', ''],
            ['RMPrice', '>=', '500'],
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],
            ['Element_Code', '!=', 'х9999210537'],
            ['balanceCount', '>=', 2],
        ])
            ->where(function (Builder $query) {
                $query->where('Producer_Brand', 'Kerama Marazzi');
                $query->orWhere('Producer_Brand', 'Vitra');
            })
            ->whereColumn('RMPrice', '>', 'Price')
            ->get()

            ->filter(function (Product $product) {
                $length = (float)$product->Lenght;
                $height = (float)$product->Height;

                if ($length < $height) {
                    $temp = $length;
                    $length = $height;
                    $height = $temp;
                }

                return ($length >= 119 && $length <= 121 && $height >= 59 && $height <= 61)         //60x120
                    || ($length >= 59 && $length <= 61 && $height >= 59 && $height <= 61)           //60x60
                    || ($length >= 79 && $length <= 81 && $height >= 79 && $height <= 81)           //80x80
                    || ($length >= 159 && $length <= 161 && $height >= 79 && $height <= 81)         //80x160
                    || ($length >= 119 && $length <= 121 && $height >= 19 && $height <= 21)         //20x120
                    || ($length >= 119 && $length <= 121 && $height >= 39 && $height <= 41)         //20x120
                    || ($length == 15 && $height == 7.4);
            });

        $monparnas = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Kerama Marazzi'],
            ['Picture', '!=', ''],
            ['Name', 'like', '%онпарнас%'],
        ])
            ->get();

        $vitrasz = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Kerama Marazzi'],
            ['Picture', '!=', ''],
            ['Name', 'like', '%Витраж%'],
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],
            ['Name', 'not like', '%ордюр%'],
        ])
            ->get();

        $kerama_marazzi = $kerama_marazzi->merge($monparnas);
        $kerama_marazzi = $kerama_marazzi->merge($vitrasz);


//      ===================AQUAFLOOR====================
        $aquafloor = AquaFloor::where([
            ['title', 'not like', '%Подложка%'],
            ['vendor_code', '!=', 'AF4078NXL'],
        ])
            ->get();

//      ===================GLOBAL-TILE====================
        $globaltile = GlobalTileNew::where([
            ['brand', 'GlobalTile'],
            ['Picture', '!=', ''],
            ['balance', '>=', 0],
        ])
            ->get();

        $discounts_all = [
            'Artkera' => [
                'discount' => 5,
                'additional' => 'По умолчанию',
            ],
            'Art Ceramic' => [
                'discount' => 5,
                'additional' => 'По умолчанию',
            ],
            'Cube Ceramica' => [
                'discount' => 5,
                'additional' => 'По умолчанию',
            ],
            'Idalgo' => [
                'discount' => 5,
                'additional' => 'По умолчанию',
            ],
            'Qua' => [
                'discount' => 5,
                'additional' => 'По умолчанию',
            ],
            'DAKO' => [
                'discount' => 5,
                'additional' => 'По умолчанию',
            ],
            'ГРАНИТЕЯ' => [
                'discount' => 5,
                'additional' => 'По умолчанию',
            ],
            'Prime Ceramics' => [
                'discount' => 0,
                'additional' => 'По умолчанию',
            ],

            'Laparet' => [
                'discount' => 0,
                'additional' => 'По умолчанию',
            ],
            'Ceradim' => [
                'discount' => 0,
                'additional' => 'По умолчанию',
            ],
            'Primavera' => [
                'discount' => 0,
                'additional' => 'По умолчанию',
            ],
            'Kerama Marazzi' => [
                'discount' => 0,
                'additional' => 'По умолчанию',
            ],
            'Vitra' => [
                'discount' => 0,
                'additional' => 'Не указывать цену',
            ],

            'Aquafloor' => [
                'discount' => 0,
                'additional' => 'По умолчанию',
            ],
            'Global Tile' => [
                'discount' => 0,
                'additional' => 'По умолчанию',
            ],
        ];

        return view('exports.avito.millennium.millennium', [

            'artkera' => $artkera,
            'artCeramic' => $artCeramic,
            'cubeCeramica' => $cubeCeramica,
            'idalgo' => $idalgo,
            'qua' => $qua,
            'dako' => $dako,
            'graniteya' => $graniteya,
            'primeCeramics' => $primeCeramics,
            'bauservice_spb' => $bauservice_spb,
            'primavera' => $primavera,
            'kerama_marazzi' => $kerama_marazzi,
            'aquafloor' => $aquafloor,
            'globaltile' => $globaltile,
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
