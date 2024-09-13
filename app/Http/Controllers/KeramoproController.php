<?php

namespace App\Http\Controllers;

use App\Models\Keramopro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeramoproController extends Controller
{
    private function saveXmlFile()
    {
        $url = "https://keramoproshop.ru/feed/sku_th.xml";

        $contents = file_get_contents($url);
        Storage::disk('local')->put('import/keramopro/example.xml', $contents);

    }

    private function xml_to_array() : array
    {
        $xmlString = Storage::disk('local')->get('import/keramopro/example.xml');
        $xmlObject = simplexml_load_string($xmlString, null, LIBXML_NOCDATA);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);

        return $phpArray;
    }

    private function images_to_array(array|string $images): array
    {
        if(!is_array($images)) {
            $arr = explode('###notinstr###', $images);
        } else {
            $arr = $images;
        }

        foreach ($arr as &$a) {
            str_replace('https://keramoproshop.ru/menu/keramogranit-jura-dark-grey-20mm/',
            'https://keramoproshop.ru/wp-content/uploads/2024/03/jura-dark-gray.jpg',
            $a);
            str_replace('https://keramoproshop.ru/menu/keramogranit-jura-light-grey-20mm-2/',
            'https://keramoproshop.ru/wp-content/uploads/2024/03/jura-light-gray.jpg',
            $a);
        }

        return $arr;
    }

    public function import()
    {
        $this->saveXmlFile();

        $array = $this->xml_to_array();

//        dd($array['offer']);

        $products = $array['offer'];
        Keramopro::truncate();
        foreach ($products as $product) {
            if (isset($product['picture'])) {
                Keramopro::create([
                    'vendor_code' => $product['param'][4],
                    'code' => $product['param'][5],
                    'name' => $product['name'],
                    'url' => $product['url'],
                    'currency' => $product['currencyId'],
                    'price_opt' => $product['price'],
                    'price' => $product['param'][3],
                    'unit' => $product['param'][2],
                    'stock' => str_replace(',', '.', $product['stock']),
                    'format' => $product['param'][9],
                    'length' => $product['param'][0],
                    'width' => $product['param'][1],
                    'surface' => $product['param'][6],
                    'color' => $product['param'][7],
                    'design' => $product['param'][8],
                    'main_image' => $product['param'][10] ?? null,
                    'images' => $this->images_to_array($product['picture']),
                ]);
            }
        }
    }

    public function index()
    {
        $products = Keramopro::paginate(15);
        return view('keramopro.index', compact('products'));
    }
}
