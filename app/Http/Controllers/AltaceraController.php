<?php

namespace App\Http\Controllers;

use App\Models\Altacera\AltaceraBalance;
use App\Models\Altacera\AltaceraPrice;
use App\Models\AltaceraPriceList;
use App\Models\AltaceraTovar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class AltaceraController extends Controller
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
                echo 'ok';
            } else {
                echo 'failed';
            }
        }

        foreach ($arr_api as $value) {
            my_unzip($value);
        }
    }

    public function json_balance_to_database()
    {
        AltaceraBalance::truncate();
        $json = Storage::disk('local')->get('import/altacera/balance/balance.json');
        $products = json_decode($json, true);
//        dd($products);
        foreach ($products as $product) {
            if ($product['depot_id'] == '8c279853-d2c9-11e8-80c3-0cc47afc14e9') {
                AltaceraBalance::create($product);
            }
        }

//        return redirect()->route('leedo.index')->with('success', 'Таблица Leedo обновлена. Ok!');
    }

    public function json_price_to_database()
    {
        AltaceraPrice::truncate();
        $json = Storage::disk('local')->get('import/altacera/price/price.json');
        $products_all = json_decode($json, true);

        foreach ($products_all as $pr) {
            if ($pr['type_price_id'] == '5945b787-12b2-11eb-80eb-00155d5d5700') {
                $products = $pr['price_list'];
            }
        }
//        dd($products);
        foreach ($products as $product) {
            AltaceraPrice::create($product);
        }

//        return redirect()->route('leedo.index')->with('success', 'Таблица Leedo обновлена. Ok!');
    }

    public function altacera_import_to_database()
    {
        $this->altacera_unzip();
        $this->json_balance_to_database();
    }
}
