<?php

namespace App\Http\Controllers;

use App\Models\Altacera\AltaceraBalance;
use App\Models\Altacera\AltaceraCategory;
use App\Models\Altacera\AltaceraPicture;
use App\Models\Altacera\AltaceraPrice;
use App\Models\Altacera\AltaceraTerritory;
use App\Models\Altacera\AltaceraTovarAvailable;
use App\Models\AltaceraPriceList;
use App\Models\Altacera\AltaceraTovar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class AltaceraImportController2 extends Controller
{
    public function altacera_unzip()
    {
        $arr_api = [
            'territory',
            'tovar',
            'price',
            'picture',
            'category',
            'balance',
        ];

        function my_unzip($value)
        {
            $url = "http://zakaz.altacera.ru/load/" . $value . "_json.zip";
            $contents = file_get_contents($url);

            $date = date("Y-m-d_His");
            $name_zip = 'import/altacera/' . $value . '_' . $date . '.zip';
            Storage::put($name_zip, $contents);

            $zip = new ZipArchive;
            $res = $zip->open(Storage::path($name_zip));
//            dd($res);

            if ($res === true) {
                $files = Storage::files('import/altacera/' . $value . '/');
                Storage::delete($files);

                $zip->extractTo(Storage::path('import/altacera/' . $value . '/'));
                $zip->close();

                // dd($files);
                $files = Storage::files('import/altacera/' . $value . '/');
//                dd($files);
                Storage::move($files[0], 'import/altacera/' . $value . '/' . $value . '.json');
                echo 'ok ';
            } else {
                echo 'failed';
            }
        }

        foreach ($arr_api as $value) {
            my_unzip($value);
        }
    }
//    ==============================================================================

    public function json_balance_to_database()
    {
        AltaceraBalance::truncate();

        $moscow_depot_id = '8c279853-d2c9-11e8-80c3-0cc47afc14e9';
        $krasnodar_depot_id = '64c17eef-42d6-11e8-812c-10feed0262c6';
//        $krasnodar_depot_id = 'e36ebb4b-0979-11ec-80f1-00155d5d5700';
        $kazan_depot_id = 'd1666584-d536-11ec-80f8-00155d5d5700';

        $json = Storage::disk('local')->get('import/altacera/balance/balance.json');
        $products = json_decode($json, true);
//        dd($products);
        foreach ($products as $product) {
            if ($product['depot_id'] == $moscow_depot_id || $product['depot_id'] == $krasnodar_depot_id || $product['depot_id'] == $kazan_depot_id) {
                AltaceraBalance::create($product);
            }
        }
    }

    public function json_price_to_database()
    {
        AltaceraPrice::truncate();

        $type_price_id = '5945b787-12b2-11eb-80eb-00155d5d5700';
        $json = Storage::disk('local')->get('import/altacera/price/price.json');
        $products_all = json_decode($json, true);

        foreach ($products_all as $pr) {
            if ($pr['type_price_id'] == $type_price_id) {
                $products = $pr['price_list'];
            }
        }

        foreach ($products as $product) {
            AltaceraPrice::create($product);
        }
    }

    public function json_tovar_to_database()
    {
        AltaceraTovar::truncate();
        $json = Storage::disk('local')->get('import/altacera/tovar/tovar.json');
        $products = json_decode($json, true);
//        dd($products);
        foreach ($products as $product) {
            unset($product['is_action']); // 16.02.24 change struct of file tovar.json (add new field 'is_action')
            unset($product['artikul_diy']); // 13.03.24 change struct of file tovar.json (add new field 'artikul_diy')
            AltaceraTovar::create($product);
        }
    }

    public function json_category_to_database()
    {
        AltaceraCategory::truncate();
        $json = Storage::disk('local')->get('import/altacera/category/category.json');
        $products = json_decode($json, true);
//        dd($products);
        foreach ($products as $product) {
            AltaceraCategory::create($product);
        }
    }

    public function json_picture_to_database()
    {
        AltaceraPicture::truncate();
        $json = Storage::disk('local')->get('import/altacera/picture/picture.json');
        $products = json_decode($json, true);
//        dd($products);
        foreach ($products as $product) {
            AltaceraPicture::create($product);
        }
    }

    public function tovar_in_avaliable()
    {
        $balances = AltaceraBalance::where('balance', '>', 0)->get();

        $tovar_ids = [];
        foreach ($balances as $balance) {
            $tovar_ids[] = $balance->tovar_id;
        }

        $tovars = AltaceraTovar::whereIn('tovar_id', $tovar_ids)->get();
        $tovars = $tovars->unique('artikul');
        $tovars = $tovars->toArray();

        AltaceraTovarAvailable::truncate();

        foreach ($tovars as $tovar) {
            AltaceraTovarAvailable::create($tovar);
        }
    }

    public function download_img()
    {
        $products = AltaceraTovarAvailable::all();
        $tovar_ids_arr = [];
        foreach ($products as $product) {
            $tovar_ids_arr[] = $product->tovar_id;
        }

        foreach ($tovar_ids_arr as $arr) {
            $name_file = $arr . '.JPEG';
            if (Storage::disk('altacera')->missing($name_file)) {

                $file = file_get_contents('https://zakaz.altacera.ru/pics/'.$arr.'.JPEG');
                if ($file != null) {
                    Storage::disk('altacera')->put($name_file, $file);
                }
            }
        }
    }

    public function altacera_import_all()
    {
        set_time_limit(120);

        $this->altacera_unzip();
//        $this->json_territory_to_database();
        $this->json_balance_to_database();
//        dd(1);
        $this->json_price_to_database();
        $this->json_tovar_to_database();
        $this->json_category_to_database();
        $this->json_picture_to_database();
        $this->tovar_in_avaliable();

        return redirect()->route('altacera.index')->with('success', 'Таблица Altacera обновлена. Ok!');
    }
}
