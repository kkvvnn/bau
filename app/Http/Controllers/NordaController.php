<?php

namespace App\Http\Controllers;

use App\Models\Rusplitka\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NordaController extends Controller
{
    public function index()
    {

    }

    public function shop()
    {
        $count_per_page = 30;
        $products = \App\Models\Product::where([['GroupProduct', '01 Плитка'], ['Producer_Brand', 'Laparet'], ['balanceCount', '>=', 0]])->orderByRaw('Lenght * Height DESC')->paginate($count_per_page);

        $count_products = \App\Models\Product::where([['GroupProduct', '01 Плитка'], ['Producer_Brand', 'Laparet'], ['balanceCount', '>=', 0]])->count();

        return view('norda.shop', [
            'products' => $products,
//            'count_per_page' => $count_per_page,
            'count_products' => $count_products,
        ]);
    }

    public function show($id)
    {
        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';

        $product = \App\Models\Product::findOrFail($id);
        $collection = $product->collections;

        if (count($collection)) {
            $url_collection = $collection[0]->Interior_Pic;
            $url_collection = explode(', ', $url_collection);

            $urls_c = [];
            foreach ($url_collection as $kkkj) {
                if ($kkkj) {
                    $urls_c[] = Storage::disk('collections')->url(Str::remove($string_for_delete, $kkkj));
                }
            }

        } else {
            $urls_c = [];
        }
        if (empty($urls_c)) {
            $urls_c[] = Storage::disk('no_image')->url('no_image.jpg');
        }

        $name_files = [];
        for ($pic = 1; $pic <= 24; $pic++) {
            if ($pic == 1) {
                $name = 'Picture';
            } else {
                $name = 'Picture'.$pic;
            }
            if ($product->$name != null) {
                $name_files[$name] = Str::remove($string_for_delete, $product->$name);
            }
        }

        $urls_2 = [];
        foreach ($name_files as $key => $value) {
            $urls_2[] = Storage::disk('public')->url($value);
        }

        $product = \App\Models\Product::find($id);

        return view('norda.show', [
            'product' => $product,
//            'stock_spb' => $stock_spb,
            'urls' => $urls_2,
            // 'url2' => $url2,
            'collection' => $collection,
            'url_collection' => $urls_c,
//            'fotos' => $fotos,
//            'vivod' => $vivod,
//            'old_price' => $old_price,
//            'text_color' => $text_color,
        ]);
    }
}
