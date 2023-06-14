<?php

namespace App\Http\Controllers;

use App\Imports\AbsolutGres\AbsolutGresScrapImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\AbsolutGres\AbsolutGresScrap;

class AbsolutGresController extends Controller
{
    public function import_from_xml()
    {
        $url = 'https://kontact-m.ru/bitrix/catalog_export/export_rYP.xml';
        $contents = file_get_contents($url);

        $date = date('Y-m-d_His');
        $name = 'import/absolut_gres/absolut_gres_'.$date.'.xml';

        Storage::put($name, $contents);

        $xml_string = Storage::get($name);
//        dd($xml);
        $xml = simplexml_load_string($xml_string);
        $json = json_encode($xml);

        $array_full = json_decode($json,TRUE);

//        dd($array_full);

        $array = $array_full['shop']['offers']['offer'];
//        dd($array);

        $absolute_gres_array = [];
        $temp_array = [];
        foreach ($array as $arr) {
            $temp_array['id_from_xml'] = $arr['@attributes']['id'];
            $temp_array['available'] = $arr['@attributes']['available'];
            $temp_array['url'] = $arr['url'];
            $temp_array['price'] = $arr['price'];
            $temp_array['picture'] = $arr['picture'];
            $temp_array['name'] = $arr['name'];

            $absolute_gres_array[] = $temp_array;
        }

        return $absolute_gres_array;

//        dd($absolute_gres_array);
//        foreach ($absolute_gres_array as $a) {
//            echo '"'.$a['url'].'",';
//        }
    }

    public function import_scrap()
    {
        $name = 'import/absolut_gres/scrap/absolut_gres.xlsx';

        Excel::import(new AbsolutGresScrapImport(), $name);

        $arrs = $this->import_from_xml();

//        dd($arrs);
        $products = AbsolutGresScrap::all();
//        dd($products);
        foreach ($products as $product) {
            foreach ($arrs as $arr) {
                if ($product->url == $arr['url']) {
                    $product->picture = $arr['picture'];
                    $product->name_from_xml = $arr['name'];
                    $product->price_from_xml = $arr['price'];
                    $product->id_from_xml = $arr['id_from_xml'];
                    $product->save();
                }
            }
        }

        return redirect('/')->with('success', 'All good!');
    }

    public function index()
    {
        $products = AbsolutGresScrap::paginate(15);
//        dd($products);
        return view('absolut_gres.index', compact('products'));
    }

    public function show($id)
    {
        $product = AbsolutGresScrap::find($id);
//        dd($products);
//        $imgs_2 = $product->img2;
//        $imgs_2 = explode("\n", $imgs_2);

        $vendor_code = $product->vendor_code;
//        $path_dir = 'storage/Foto/' . $vendor_code;
//        $directories = Storage::directories('public/Foto');
        $files = Storage::disk('foto_absolut_gres')->files('/'.str_replace(' ', '',$vendor_code));
//        dd($files);
        $fotossss = $files;
        $fotos = [];
        foreach ($fotossss as $f) {
            $fotos[] = Storage::disk('foto_absolut_gres')->url($f);
        }
//dd($fotos);
        return view('absolut_gres.show', compact('product',  'fotos'));
    }
}
