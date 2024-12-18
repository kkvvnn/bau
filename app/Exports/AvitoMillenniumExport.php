<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\AbsolutGres\AbsolutGresScrap;
use App\Models\Altacera\AltaceraTovarAvailable;
use App\Models\AquaFloor;
use App\Models\ArtCentreNew;
use App\Models\Artkera\ArtkeraTovarAvailable;
use App\Models\BauserviceSpb;
use App\Models\Kevis;
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

//        ----- ARTKERA -----
        $artkera = ArtkeraTovarAvailable::all();

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
            ->whereJsonLength('images', '>', 0)
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
