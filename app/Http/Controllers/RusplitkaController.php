<?php

namespace App\Http\Controllers;

use App\Exports\RusplitkaExcelExport;
use App\Exports\RusplitkaExcelExport2;
use App\Models\Rusplitka\Collection;
use App\Models\Rusplitka\Product;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class RusplitkaController extends Controller
{
//    public function saveXmlFile()
//    {
//        $url = "https://opt.rusplitka.ru/opt-feed.xml";
//
//        $client = new Client();
//
//        try {
//            $response = $client->get($url); // Выполняем GET-запрос по ссылке
//            $contents = $response->getBody()->getContents(); // Получаем содержимое ответа
//
////            $contents = iconv("windows-1251","utf-8",$contents);
////            $contents = utf8_encode($contents);
//            $contents = mb_convert_encoding($contents, 'UTF-8', 'WINDOWS-1252');
//
//            Storage::disk('local')->put('import/rusplitka/example.xml', $contents);
//
//            return "XML-файл успешно сохранен.";
//        } catch (\Exception $e) {
//            return "Произошла ошибка при сохранении XML-файла: " . $e->getMessage();
//        }
//    }

    public function saveXmlFile()
    {
//        $url = "https://opt.rusplitka.ru/opt-feed.xml";
        $url = "https://rusplitka.ru/upload/feed/opt-feed.xml";

        $contents = file_get_contents($url);
//        $contents = iconv("windows-1251","UTF-8", $contents);
        Storage::disk('local')->put('import/rusplitka/example.xml', $contents);

    }

    public function xml_to_array() : array
    {
        $xmlString = Storage::disk('local')->get('import/rusplitka/example.xml');
//        $xmlString = iconv("UTF-8", "windows-1251", $xmlString);
        $xmlObject = simplexml_load_string($xmlString, null, LIBXML_NOCDATA);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);

//        dd($phpArray['shop']['offers']['offer']);
//        dd($phpArray['shop']['offers']['offer']);

        return $phpArray;
    }

    public function import()
    {
        $this->saveXmlFile();
        $array = $this->xml_to_array();
//        dd($array['shop']['offers']['offer'][2]);
//        dd($array['shop']['collections']['collection']);

        $collections = $array['shop']['collections']['collection'];
        Collection::truncate();
        foreach ($collections as $collection) {
            Collection::create([
                'code' => $collection['@attributes']['id'],
                'picture' => is_array($collection['picture']) ? implode(' | ', $collection['picture']) : $collection['picture'],
                'url' => $collection['url'],
                'type' => $collection['type'],
                'name' => $collection['name'],
                'country' => $collection['country_of_origin'],
                'brand' => $collection['brand'],
                'is_new' => json_encode($collection['is_new']),
            ]);
        }

        $products = $array['shop']['offers']['offer'];
        Product::truncate();
        foreach ($products as $product) {
            Product::create([
                'code' => $product['@attributes']['id'],
                'collection_id' => $product['collection_id'],
                'picture' => is_array($product['picture']) ? implode(' | ', $product['picture']) : $product['picture'],
                'url' => $product['url'],
                'external_id' => $product['external_id'] ?? null,
                'name' => $product['name'],
                'articul' => $product['articul'] ?? null,
                'svoystvo' => $product['svoystvo'] ?? null,
                'size_a' => $product['size_a'] ?? null,
                'size_b' => $product['size_b'] ?? null,
                'unit' => $product['unit'] ?? null,
                'currency' => $product['currency'] ?? null,
                'weight' => $product['weight'] ?? null,
                'in_pack_sht' => $product['in_pack_sht']  ?? null,
                'in_pack_m2' => $product['in_pack_m2']  ?? null,
                'thickness' => $product['thickness'] ?? null,
                'surface' => $product['surface'] ?? null,
                'country_of_origin' => $product['country_of_origin'] ?? null,
                'brand_name' => $product['brand_name'] ?? null,
                'price' => $product['price'] ?? null,
                'price_rozn' => $product['price_rozn'] ?? null,
                'rest_skald_ljubercy' => $product['rest_skald_ljubercy'] ?? null,
                'rest_skald_ljubercy_rezerv' => $product['rest_skald_ljubercy_rezerv'] ?? null,
                'rest_skald_bronnicy' => $product['rest_skald_bronnicy'] ?? null,
                'rest_skald_bronnicy_rezerv' => $product['rest_skald_bronnicy_rezerv'] ?? null,
                'rest_skald_20t' => $product['rest_skald_20t'] ?? null,
                'rest_skald_20t_rezerv' => $product['rest_skald_20t_rezerv'] ?? null,
                'rest_skald_krasnodar' => $product['rest_skald_krasnodar'] ?? null,
                'rest_skald_krasnodar_rezerv' => $product['rest_skald_krasnodar_rezerv'] ?? null,
                'rest_real_free' => $product['rest_real_free'] ?? null,
            ]);
        }

        return redirect()->route('rusplitka.index')->with('success', 'Таблица Rusplitka обновлена. Ok!');
    }

    public function test()
    {
//        $collection = Collection::find(3);
//        dd($collection->products);

//        $product = Product::find(88);
//        dd($product->collection);
    }

    public function index()
    {
        $products = Product::where('price_rozn', '!=', 0)
            ->paginate(15);
        return view('rusplitka.index2', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $img = $product->picture;
        $imgs = explode(' | ', $img);
//        dd($product);

        $collection = $product->collection;
        $img_collection = $collection->picture;
        $img_collection = explode(' | ', $img_collection);

        $text_color = '';
        $date_now = \Carbon\Carbon::now();
        $date_of_update = $product->updated_at;
        $diff_days = $date_now->diffInDays($date_of_update);

        if ($diff_days == 0) {
            $text_color = 'text-success';
        } elseif ($diff_days <= 7) {
            $text_color = 'text-warning';
        } else {
            $text_color = 'text-danger';
        }

        $bronnicy_stock = (float)$product->rest_skald_bronnicy - (float)$product->rest_skald_bronnicy_rezerv;
        $ljubercy_stock = (float)$product->rest_skald_ljubercy - (float)$product->rest_skald_ljubercy_rezerv;
        $sklad_20t_stock = (float)$product->rest_skald_20t - (float)$product->rest_skald_20t_rezerv;
        $krasnodar_stock = (float)$product->rest_skald_krasnodar - (float)$product->rest_skald_krasnodar_rezerv;

//        return view('rusplitka.show2', compact('product', 'imgs', 'img_collection', 'text_color'));
        return view('rusplitka.show2', [
            'product' => $product,
            'imgs' => $imgs,
            'img_collection' => $img_collection,
            'text_color' => $text_color,
            'bronnicy_stock' => $bronnicy_stock,
            'ljubercy_stock' => $ljubercy_stock,
            'sklad_20t_stock' => $sklad_20t_stock,
            'krasnodar_stock' => $krasnodar_stock,
        ]);
    }

    public function export()
    {
        $date = date('Y-m-d_H-i-s');
        return Excel::download(new RusplitkaExcelExport2, 'rusplitka-'.$date.'.xlsx');
    }

    public function collection($name)
    {
        $products = Product::whereHas('collection', function ($query) use ($name) {
            $query->where('name', 'LIKE', '%'.$name.'%');
        })->paginate(15);

        return view('rusplitka.index2', compact('products'));
    }
}
