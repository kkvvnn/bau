<?php

namespace App\Http\Controllers;

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
            $res = $zip->open($name_zip);

            if ($res === true) {
                $files = Storage::files('import/altacera/' . $value . '/');
                Storage::delete($files);

                $zip->extractTo('import/altacera/' . $value . '/');
                $zip->close();

                // dd($files);
                $files = Storage::files('import/altacera/' . $value . '/');
                Storage::move($files[0], 'import/altacera/' . $value . '/' . $value .'.json');
                echo 'ok';
            } else {
                echo 'failed';
            }
        }

        foreach ($arr_api as $value) {
            my_unzip($value);
        }
    }

    public function altacera_price_list_import_to_database()
    {
        $territories = Storage::json('import/altacera/territory/territory.json');
        $prices = Storage::json('import/altacera/price/price.json');
        $tovars = Storage::json('import/altacera/tovar/tovar.json');
        $categories = Storage::json('import/altacera/category/category.json');
        $balances = Storage::json('import/altacera/balance/balance.json');
        $pictures = Storage::json('import/altacera/picture/picture.json');
        // dd($prices);

        foreach ($territories as $territory) {
            if ($territory['price_list'] == 'Москва') {
                $type_price_id = $territory['type_price_id'];
                $depot_id = $territory['depot_id'];
            }
        }

        foreach ($prices as $price) {
            if ($price['type_price_id'] == $type_price_id) {
                $price_list = $price['price_list'];
            }
        }

        // dd($price_list);

        foreach ($price_list as $p_r) {
            $altacera_price_lists = AltaceraPriceList::create($p_r);
        }

        // $altacera_price_lists = AltaceraPriceList::create();
    }

    public function altacera_tovars_import_to_database()
    {
        $tovars = Storage::json('import/altacera/tovar/tovar.json');
        // dd($tovars);

        foreach ($tovars as $tovar) {
            // dd($tovar);
            $altacera_tovars = AltaceraTovar::create($tovar);
        }


    }
}
