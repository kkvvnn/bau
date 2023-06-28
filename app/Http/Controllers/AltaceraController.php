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

    public function json_balance_to_database()
    {

    }
}
