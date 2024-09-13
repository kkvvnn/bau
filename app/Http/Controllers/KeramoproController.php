<?php

namespace App\Http\Controllers;

use App\Models\Keramopro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            if ($a == 'https://keramoproshop.ru/menu/keramogranit-jura-dark-grey-20mm/') {
                $a = 'https://keramoproshop.ru/wp-content/uploads/2024/03/jura-dark-gray.jpg';
            }
            if ($a == 'https://keramoproshop.ru/menu/keramogranit-jura-light-grey-20mm-2/') {
                $a = 'https://keramoproshop.ru/wp-content/uploads/2024/03/jura-light-gray.jpg';
            }
        }

        return array_reverse($arr);
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
                    'type' => 'Керамогранит',
                    'title' => $product['name'],
                    'collection' => ucfirst(strtolower(explode(' ', $product['name'])[0])),
                    'brand' => 'Novin Ceram',
                    'country' => 'Иран',
                    'url' => $product['url'],
                    'currency' => $product['currencyId'],
                    'price_opt' => $product['price'],
                    'price' => $product['param'][3],
                    'unit' => $product['param'][2],
                    'balance' => str_replace(',', '.', $product['stock']),
                    'format' => $product['param'][9],
                    'length' => $product['param'][0],
                    'width' => $product['param'][1],
                    'fat' => 20,
                    'surface' => ucfirst_rus($product['param'][6]),
                    'color' => ucfirst_rus($product['param'][7]),
                    'design' => ucfirst_rus($product['param'][8]),
                    'main_image' => $product['param'][10] ?? null,
                    'images' => $this->images_to_array($product['picture']),
                ]);
            }
        }

        return redirect()->route('keramopro.index')->with('success', 'Таблица Keramopro обновлена. Ok!');
    }

    public function index()
    {
        $products = Keramopro::paginate(15);
        return view('keramopro.index', compact('products'));
    }

    public function show($id)
    {
        $product = Keramopro::find($id);

        $string_for_delete = 'https://keramoproshop.ru/wp-content/';
        $img = Storage::disk('keramopro')->url(Str::remove($string_for_delete, $product->images[0]));

//        -----------------------------
        $urls_c = [];
        if ($product->images != '') {
            $urls_c[] = Storage::disk('keramopro')->url(Str::remove($string_for_delete, $product->images[0]));
        } else {
            $urls_c[] = Storage::disk('no_image')->url('no_image.jpg');
        }
//        -----------------------------------

        $urls_2 = [];
        foreach ($product->images as $key => $value) {
            $urls_2[] = Storage::disk('keramopro')->url(Str::remove($string_for_delete, $value));
        }
//        ------------------------------------

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

        $vivod = '';

//        return view('pixmosaic-new.show', compact('product', 'text_color', 'urls_c'));
        return view('keramopro.show', [
            'product' => $product,
            'urls' => $urls_2,
            // 'url2' => $url2,
//            'collection' => $collection,
            'url_collection' => $urls_c,
            'vivod' => $vivod,
            'text_color' => $text_color,
        ]);
    }

    public function collection($name)
    {
        $products = Keramopro::where('collection', 'LIKE', '%'.$name.'%')
            ->paginate(15);

        return view('keramopro.index', compact('products'));
    }
}
