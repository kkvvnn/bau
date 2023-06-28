<?php

namespace App\Http\Controllers;

use App\Models\Altacera\AltaceraBalance;
use App\Models\Altacera\AltaceraCategory;
use App\Models\Altacera\AltaceraPicture;
use App\Models\Altacera\AltaceraPrice;
use App\Models\Altacera\AltaceraTerritory;
use App\Models\AltaceraPriceList;
use App\Models\Altacera\AltaceraTovar;
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

//    ==============================================================================
    public function json_territory_to_database()
    {
        AltaceraTerritory::truncate();
        $json = Storage::disk('local')->get('import/altacera/territory/territory.json');
        $products = json_decode($json, true);
//        dd($products);
        foreach ($products as $product) {
            AltaceraTerritory::create($product);
        }

//        return redirect()->route('leedo.index')->with('success', 'Таблица Leedo обновлена. Ok!');
    }

    public function json_balance_to_database()
    {
        AltaceraBalance::truncate();

        $territory = AltaceraTerritory::where('price_list', 'Москва')->get();
//        dd($territory[0]->depot_id);
        $json = Storage::disk('local')->get('import/altacera/balance/balance.json');
        $products = json_decode($json, true);
//        dd($products);
        foreach ($products as $product) {
            if ($product['depot_id'] == $territory[0]->depot_id) {
                AltaceraBalance::create($product);
            }
        }

//        return redirect()->route('leedo.index')->with('success', 'Таблица Leedo обновлена. Ok!');
    }

    public function json_price_to_database()
    {
        AltaceraPrice::truncate();

        $territory = AltaceraTerritory::where('price_list', 'Москва')->get();
//        dd($territory);
        $json = Storage::disk('local')->get('import/altacera/price/price.json');
        $products_all = json_decode($json, true);

        foreach ($products_all as $pr) {
            if ($pr['type_price_id'] == $territory[0]->type_price_id) {
                $products = $pr['price_list'];
            }
        }
//        dd($products);
        foreach ($products as $product) {
            AltaceraPrice::create($product);
        }

//        return redirect()->route('leedo.index')->with('success', 'Таблица Leedo обновлена. Ok!');
    }

    public function json_tovar_to_database()
    {
        AltaceraTovar::truncate();
        $json = Storage::disk('local')->get('import/altacera/tovar/tovar.json');
        $products = json_decode($json, true);
//        dd($products);
        foreach ($products as $product) {
            AltaceraTovar::create($product);
        }

//        return redirect()->route('leedo.index')->with('success', 'Таблица Leedo обновлена. Ok!');
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

//        return redirect()->route('leedo.index')->with('success', 'Таблица Leedo обновлена. Ok!');
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

//        return redirect()->route('leedo.index')->with('success', 'Таблица Leedo обновлена. Ok!');
    }
}
