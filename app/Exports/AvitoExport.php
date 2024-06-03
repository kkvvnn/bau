<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\AbsolutGres\AbsolutGresScrap;
use App\Models\Altacera\AltaceraTovarAvailable;
use App\Models\AquaFloor;
use App\Models\Artcenter;
use App\Models\Kerabellezza2;
use App\Models\Kevis;
use App\Models\PixmosaicNew;
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

class AvitoExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    public $foto = '';
    public $phone = '';
    public $name = '';
    public $contact_method = '';
    public $address = '';
    public $add_description = '';
    public $add_description_first = '';
    public $sales = [];

    public function __construct($foto, $phone, $name, $contact_method, $address, $add_description, $add_description_first, $sales)
    {
        $this->foto = $foto;
        $this->phone = $phone;
        $this->name = $name;
        $this->contact_method = $contact_method;
        $this->address = $address;
        $this->add_description = $add_description;
        $this->add_description_first = $add_description_first;
        $this->sales = $sales;
    }

    public function bindValue(Cell $cell, $value)
    {

        $cell->setValueExplicit($value, DataType::TYPE_STRING);

        return true;
    }

    public function view(): View
    {
        set_time_limit(90);

        $products_all = Product::where([['GroupProduct', '01 Плитка'],
            ['Producer_Brand', '!=', 'Kerama Marazzi'],
            ['Producer_Brand', '!=', 'Шахтинская плитка'],
            ['Producer_Brand', '!=', ''],
            ['Element_code', '!=', 'х9999286854'],
            ['Element_code', '!=', 'х9999221101'],
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
//        dd($blaze);

        $products_cersanit_except = Product::where([['Producer_Brand', 'Cersanit'], ['balanceCount', '<', 1]])->get();
        // dd($products_cersanit_except);
        // dd($products_all);
        $ids_cersanit_except = [];
        foreach ($products_cersanit_except as $pr) {
            $ids_cersanit_except[] = $pr->id;
        }

        // dd($ids_cersanit_except);

        $products = $products_all->except($ids_cersanit_except);
        $products = $products->merge($blaze);
//        dd($products);
//      ==============================================
        $primavera = Primavera::where('country', '!=', 'Киргизия')->get();
//      ==============================================
//        $absolut_gres = AbsolutGresScrap::all();
        $absolut_gres = [];
//      ==============================================
//        $leedo = LeedoProduct::where('Sklad_Msk_LeeDo', '>', 0)->orWhere('Sklad_SPb_LeeDo', '>', 0)->get();
        $leedo = LeedoProduct::where([['Sklad_Msk_LeeDo', '>', 0],
            ['Category', 'like', 'Мозаика/%'],
            ['System_ID', '!=', '00-00003849'],
            ['System_ID', '!=', '00-00002578'],
            ])
            ->orWhere([['Sklad_SPb_LeeDo', '>', 0],
                ['Category', 'like', 'Мозаика/%'],
                ['System_ID', '!=', '00-00003849'],
                ['System_ID', '!=', '00-00002578'],
                ])->get();
//        $leedo = [];
//        dd($leedo);
//      ==============================================
        $altacera = AltaceraTovarAvailable::where([['artikul', '!=', 'PWU09DLM3'],
            ['artikul', '!=', 'GFA114CMT07R'],
            ['artikul', '!=', 'BWA60ALD004'],
            ['artikul', '!=', 'DWU09BNT017'],
            ['artikul', '!=', 'GFA57SLC00L'],
            ['artikul', '!=', 'PWA11ALD1'],
            ['artikul', '!=', 'BWA60ALD404'],
            ['artikul', '=', 'TWU11SLR404'],
        ])->get();
        dd($altacera[0]->balance);
//      ==============================================
        $ntceramic = NtCeramicNoImgs::all();
//        $ntceramic = [];
//      ==============================================
        $kevis = Kevis::all();
//      ==============================================
        $rusplitka = RusplitkaProduct::where([['svoystvo', 'Керамогранит'],
            ['rest_real_free', '!=', 0],
            ['price_rozn', '!=', 0],
        ])->get();
//      ==============================================
//        $technotile = TechnotileProduct::where('available', 'true')->get();
//        $technotile = TechnotileProduct::where([['available', 'true'], ['price', '>=', 2000]])->get();
        $technotile = [];
//      ==============================================
        $aquafloor = AquaFloor::where([['title', 'not like', '%Подложка%'],
            ['vendor_code', '!=', 'AF4078NXL'],
            ])->get();
        //      ---------------------PIXMOSAIC---------------------

        $pixmosaics = PixmosaicNew::where('price', '!=', 0)
            ->where('stock', '!=', '')
            ->get();


        //      ---------------------ARTCENTER---------------------

        $artcenter = Artcenter::where([['brand', 'Art Ceramic'],
            ['moscow_stock', '>=', 2],
            ['image1', '!=', ''],
            ['vendor_code', '!=', 'Spenze Gris 60x120'],
        ])->get();

        //      ---------------------KERABELLEZZA---------------------

        $kerabellezza = Kerabellezza2::where([
            ['type', '!=', 'product'],
            ['image', '!=', ''],
            ['parent_code', '!=', '107073'],
            ['parent_code', '!=', '107072'],
        ])
            ->get();
        $kerabellezza = [];

        if ($this->foto == '') {
            return view('exports.avito', [
                // 'products' => Product::where([['balanceCount', '>=', 2], ['RMPrice', '>=', '500']])->whereColumn('RMPrice', '>', 'Price')->get()
                'products' => $products,
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
                'kerabellezza' => $kerabellezza,
                'phone' => $this->phone,
                'name' => $this->name,
                'contact_method' => $this->contact_method,
                'address' => $this->address,
                'add_description' => $this->add_description,
                'add_description_first' => $this->add_description_first,
                'sales' => $this->sales,
            ]);
        } else {
            return view('exports.avito_foto', [
                // 'products' => Product::where([['balanceCount', '>=', 2], ['RMPrice', '>=', '500']])->whereColumn('RMPrice', '>', 'Price')->get()
                'products' => $products,
                'primavera' => $primavera,
                'absolut_gres' => $absolut_gres,
                'leedo' => $leedo,
                'altacera' => $altacera,
                'ntceramic' => $ntceramic,
                'kevis' => $kevis,
                'rusplitka' => $rusplitka,
            ]);
        }

    }
}
