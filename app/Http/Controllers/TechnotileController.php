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
                'available' => $product['@attributes']['available'] ?? null,
                'url' => $product['url'] ?? null,
                'price' => $product['price'] ?? null,
                'category_id' => $product['categoryId'] ?? null,
                'picture' => $product['picture'] ?? null,
                'name' => $product['name'] ?? null,
                'description' => $product['description'] ?? null,
                'country' => $product['country_of_origin'] ?? null,
                'collection' => $product['param'][0] ?? null,
                'surface_type' => $product['param'][1] ?? null,
                'surface_faktura' => $product['param'][2] ?? null,
                'color' => $product['param'][3] ?? null,
                'length' => $product['param'][4] ?? null,
                'width' => $product['param'][5] ?? null,
                'fat' => $product['param'][6] ?? null,
                'in_pallet_m2' => $product['param'][7] ?? null,
                'pallet_massa_kg' => $product['param'][8] ?? null,
                'in_box_m2' => $product['param'][9] ?? null,
                'box_massa_kg' => $product['param'][10] ?? null,
                'count_in_box' => $product['param'][11]??null,
            ]);
        }
    }

    public function index()
    {
        $products = Product::paginate(15);
        return view('technotile.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('technotile.show', compact('product'));
    }
}
