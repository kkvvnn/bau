<?php

namespace App\Exports;

use App\Models\AvitoTwoExcel;
use App\Models\Discount;
use App\Models\LeedoProduct;
use App\Models\PixmosaicNew;
use App\Traits\Avito\ExportConstruct;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use App\Models\Product;

class AvitoLaparetMoscowExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
    use ExportConstruct;

    public function view(): View
    {
        set_time_limit(90);

//        $laparets = Product::where('GroupProduct', '=', '01 Плитка')
//            ->where('RMPrice', '>=', 700)
//            ->where('Element_Code', '!=', 'х9999278638')
//            ->where('Element_Code', '!=', 'х9999299093')
//            ->where('Picture', '!=', '')
//            ->where('Producer_Brand', '=', 'Laparet')
//            ->whereColumn('RMPrice', '>', 'Price')
//            ->get()
//            ->filter(function (Product $product) {
//                return $product->balance == 1
//                    || (isset($product->kzn->balance) && $product->kzn->balance == 1)
//                    || (isset($product->spb->balance) && $product->spb->balance == 1);
//            })
//            ->filter(function (Product $product) {
//                $length = (int)$product->Lenght;
//                $height = (int)$product->Height;
//                return ($length >= 119 && $length <= 121 && $height >= 59 && $height <= 61)         //60x120
//                    || ($length >= 59 && $length <= 61 && $height >= 59 && $height <= 61)           //60x60
//                    || ($length >= 79 && $length <= 81 && $height >= 79 && $height <= 81)           //80x80
//                    || ($length >= 159 && $length <= 161 && $height >= 79 && $height <= 81)         //80x160
//                    || ($length >= 119 && $length <= 121 && $height >= 19 && $height <= 21)         //20x120
//                    || ($length >= 79 && $length <= 81 && $height >= 19 && $height <= 21)           //20x80
//                    || ($length >= 59 && $length <= 61 && $height >= 14 && $height <= 16);          //15x60
//            });


//        $laparets = Product::where([
//            ['GroupProduct', '01 Плитка'],
//            ['Element_code', '!=', 'х9999286854'],
//            ['Element_code', '!=', 'х9999221101'],
//            ['Element_code', '!=', 'х9999278638'],
//            ['Element_code', '!=', 'х9999213228'],
//            ['Element_code', '!=', 'х9999308135'],
//            ['Element_code', '!=', 'х9999308136'],
//            ['Element_code', '!=', 'х9999308143'],
//            ['Element_code', '!=', 'х9999308148'],
//            ['Element_code', '!=', 'х9999308149'],
//            ['Element_code', '!=', 'х9999308150'],
//            ['Element_code', '!=', 'х9999213203'],
//            ['Element_code', '!=', 'х9999299093'],
//            ['Element_code', '!=', 'х9999213204'],
//            ['Name', 'not like', '%ставк%'],
//            ['Name', 'not like', '%ступен%'],
//            ['Name', 'not like', '%пецэлем%'],
//            ['balance', 1],
//            ['RMPrice', '>=', '900'],
//            ['RMPrice', '!=', ''],
//            ['Picture', '!=', ''],
//            ['Element_code', '!=', 'х9999294554'],
//        ])
//            ->where(function (Builder $query) {
//                $query->where('Producer_Brand', 'Laparet');
//                $query->orWhere('Producer_Brand', 'Ceradim');
//            })
//            ->whereColumn('RMPrice', '>', 'Price')
//            ->get();


//              ==================BAUSERVIS====================

        $laparets = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],
            ['balanceCount', '>=', 1],
            ['RMPrice', '>=', 990],
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
                    || ($length >= 59 && $length <= 61 && $height >= 14 && $height <= 16);          //15x60
            });


        //==================BAUSERVICE-WATER-MIXERS==================

        $water_mixers = Product::where([
            ['GroupProduct', '02 Сантехника'],
            ['balanceCount', '>', 0],
            ['RMPrice', '>', 0],
            ['Picture', '!=', ''],
            ['Category', 'Смесители'],
        ])
            ->get();


//  ===========================OLD=================================
        $olds = AvitoTwoExcel::whereIn('AvitoId', [
            '2925091517',
            '2797125306',
            '2764970303',
            '2765196069',
            '2765290501',
            '2924855920',
            '2957716643',
            '2829595083',
            '2765302371',
            '2797087245',
            '2765747168',
            '2765086357',
            '2797419166',
        ])
        ->get();

//      ===================PIXMOSAIC====================
        $pixmosaics = PixmosaicNew::where('price', '!=', 0)
            ->where('stock', '>=', 1)
            ->where([
                ['vendor_code', '!=', 'PIX700-2'],
                ['vendor_code', '!=', 'PIX752'],
                ['vendor_code', '!=', 'PIX767'],
                ['vendor_code', '!=', 'PIX750'],
                ['vendor_code', '!=', 'PIX700'],
                ['vendor_code', '!=', 'PIX701'],
            ])
            ->get();

//      ===================LEEDO===================
        $leedo = LeedoProduct::where([
            ['Sklad_Msk_LeeDo', '>', 4],
            ['Category', 'like', 'Мозаика/%'],
            ['System_ID', '!=', '00-00002393'],
        ])
            ->get();

        //      ===================DISCOUNTS==================

        $discounts = Discount::whereAccount('Laparet-Запад')->get();
        $discounts_all = [];
        foreach ($discounts as $discount) {
            $discounts_all[$discount->name] = ['discount' => $discount->discount, 'additional' => $discount->additional];
        }


        return view('exports.avito.laparet-moscow', [
            'laparets' => $laparets,
            'water_mixers' => $water_mixers,
            'olds' => $olds,
//            'pixmosaics' => $pixmosaics,
            'pixmosaics' => [],
//            'leedo' => $leedo,
            'leedo' => [],
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
