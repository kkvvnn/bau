<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AvitoIndexController extends Controller
{
    public function index_avit_back()
    {
        $type = 'all';

        $products = Product::where('GroupProduct', '=', '01 Плитка')
            ->where('RMPrice', '>=', 700)
            ->where('Picture', '!=', '')
            ->where('Producer_Brand', '=', 'Laparet')
            ->whereColumn('RMPrice', '>', 'Price')
            ->orderByDesc('RMPrice')
            ->get()
            ->filter(function (Product $product) {
                return $product->balance == 1
                    || (isset($product->kzn->balance) && $product->kzn->balance == 1)
                    || (isset($product->spb->balance) && $product->spb->balance == 1);
            })
            ->filter(function (Product $product) {
                $length = (int)$product->Lenght;
                $height = (int)$product->Height;
                return ($length >= 119 && $length <= 121 && $height >= 59 && $height <= 61)         //60x120
                    || ($length >= 59 && $length <= 61 && $height >= 59 && $height <= 61)           //60x60
                    || ($length >= 79 && $length <= 81 && $height >= 79 && $height <= 81)           //80x80
                    || ($length >= 159 && $length <= 161 && $height >= 79 && $height <= 81)         //80x160
                    || ($length >= 119 && $length <= 121 && $height >= 19 && $height <= 21);        //20x120
            });

        return view('avito-index.index', [
            'products' => $products,
        ]);
    }

    public function index_avito()
    {
        $type = 'all';

        $products = Product::where('GroupProduct', '=', '01 Плитка')
            ->where('RMPrice', '>=', 700)
            ->where('Picture', '!=', '')
            ->where('Producer_Brand', '=', 'Laparet')
            ->whereColumn('RMPrice', '>', 'Price')
            ->orderByDesc('RMPrice')
            ->get()
            ->filter(function (Product $product) {
                return $product->balance == 1
                    || (isset($product->kzn->balance) && $product->kzn->balance == 1)
                    || (isset($product->spb->balance) && $product->spb->balance == 1);
            });


        $size_60x120 = $products
            ->filter(function (Product $product) {
                $length = (int)$product->Lenght;
                $height = (int)$product->Height;
                return ($length >= 119 && $length <= 121 && $height >= 59 && $height <= 61);
            });

        $size_60x60 = $products
            ->filter(function (Product $product) {
                $length = (int)$product->Lenght;
                $height = (int)$product->Height;
                return ($length >= 59 && $length <= 61 && $height >= 59 && $height <= 61);
            });

        $size_80x80 = $products
            ->filter(function (Product $product) {
                $length = (int)$product->Lenght;
                $height = (int)$product->Height;
                return ($length >= 79 && $length <= 81 && $height >= 79 && $height <= 81);
            });

        $size_80x160 = $products
            ->filter(function (Product $product) {
                $length = (int)$product->Lenght;
                $height = (int)$product->Height;
                return ($length >= 159 && $length <= 161 && $height >= 79 && $height <= 81);
            });

        $size_20x120 = $products
            ->filter(function (Product $product) {
                $length = (int)$product->Lenght;
                $height = (int)$product->Height;
                return ($length >= 119 && $length <= 121 && $height >= 19 && $height <= 21);
            });

        return view('avito-index.index', [
            'size_60x120' => $size_60x120,
            'size_60x60' => $size_60x60,
            'size_80x80' => $size_80x80,
            'size_80x160' => $size_80x160,
            'size_20x120' => $size_20x120,
        ]);
    }
}
