<?php

namespace App\Http\Controllers;

use App\Models\Technotile\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnotileController extends Controller
{
    public function saveXmlFile()
    {
        $url = "https://technotile.ru/bitrix/catalog_export/export_jk0.xml";

        $contents = file_get_contents($url);
        Storage::disk('local')->put('import/technotile/example.xml', $contents);

    }

    public function xml_to_array() : array
    {
        $xmlString = Storage::disk('local')->get('import/technotile/example.xml');
        $xmlObject = simplexml_load_string($xmlString, null, LIBXML_NOCDATA);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);

        return $phpArray;
    }


    public function import()
    {
        $this->saveXmlFile();
        $array = $this->xml_to_array();

        $products = $array['shop']['offers']['offer'];
        Product::truncate();
        foreach ($products as $product) {
            Product::create([
                'code' => $product['@attributes']['id'],
                'available' => $product['@attributes']['available'],
                'url' => $product['url'],
                'price' => $product['price'],
                'category_id' => $product['categoryId'],
                'picture' => $product['picture'],
                'name' => $product['name'],
                'description' => $product['description'],
                'country' => $product['country_of_origin'],
                'collection' => $product['param'][0],
                'surface_type' => $product['param'][1],
                'surface_faktura' => $product['param'][2],
                'color' => $product['param'][3],
                'length' => $product['param'][4],
                'width' => $product['param'][5],
                'fat' => $product['param'][6],
                'in_pallet_m2' => $product['param'][7],
                'pallet_massa_kg' => $product['param'][8],
                'in_box_m2' => $product['param'][9],
                'box_massa_kg' => $product['param'][10],
                'count_in_box' => $product['param'][11],
            ]);
        }

    }
}
