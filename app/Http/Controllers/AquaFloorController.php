<?php

namespace App\Http\Controllers;

use App\Imports\AquaFloorImport;
use App\Models\AquaFloor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class AquaFloorController extends Controller
{
    public function import()
    {
        // $name = Storage::get('aquafloor/import/aquafloor_all.xlsx');
        $name = 'import/aquafloor/aquafloor.xlsx';

        Excel::import(new AquaFloorImport, $name);

        return redirect('/')->with('success', 'All good!');
    }

    public function download_pic()
    {
        set_time_limit(1000);
        $products = AquaFloor::all();

        for ($i = 1; $i <= 3; $i++) {
            $img_n = 'img_'.$i;
            foreach ($products as $product) {

                if ($product->$img_n == '' || $product->$img_n == null) {
                    continue;
                }

                $url = 'https://aqua-floor.com'.$product->$img_n;

                // $url = "https://aqua-floor.com/media/product/AF4012ART_str.jpg";

                $file_extension = pathinfo($url)['extension'];
                // dd($file_extension);

                $file_name = $product->title.'_'.$i.'.'.$file_extension;
                // dd($file_name);

                if (Storage::disk('aquafloor')->missing($file_name)) {

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_exec($ch);

                    $http_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
                    curl_close($ch);

                    // dd($http_code);
                    if ($http_code != 404) {
                        $file = file_get_contents($url);
                        Storage::disk('aquafloor')->put($file_name, $file);
                    }
                }
            }
        }
    }

    public function index()
    {
        $products = AquaFloor::paginate(20);

        return view('aquafloor.index', [
            'products' => $products,
        ]);
    }

    public function index_product($title)
    {
        $product = AquaFloor::where('title', $title)->get();
        // dd($product);
        return view('aquafloor.index_product', [
            'product_one' => $product,
        ]);
    }

    public function index_one_collection($collection_name)
    {
        $products = AquaFloor::where('collection_url', $collection_name)->paginate(20);

        return view('aquafloor.index', [
            'products' => $products,
        ]);
    }

    public function index_collections()
    {
        $collections = [];
        $products = AquaFloor::all();

        foreach ($products as $product) {
            $collections[] = $product->collection_url;
        }

        $collections = array_unique($collections);
        $collections = array_reverse($collections);
        // $collections = AquaFloor::distinct()->get(['collection']);
        // dd($collections);
        return view('aquafloor.index_collections', [
            'collections' => $collections,
        ]);
    }
}
