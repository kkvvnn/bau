<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class MyHelpController extends Controller
{
    public function list()
    {
        $products = Product::where([['Producer_Brand', 'Laparet'], ['Lenght', 60], ['Height', 60]])->orderBy('Name')->get();
        // dd($products);

        return view('help.list', [
            'products' => $products,
        ]);
    }

    public function biggest()
    {

        $products = Product::where([['Producer_Brand', 'Laparet'], ['Lenght', 120], ['Height', 60]])->orderBy('balanceCount')->get();
        // dd($products);

        return view('help.biggest', [
            'products' => $products,
        ]);
    }

    public function derevo()
    {
        $products = Product::where([['Lenght', '>', 110], ['Lenght', '<', 120], ['Height', '>', 18], ['Height', '<', 23]])->paginate(15);

        return view('product.index', [
            'products' => $products,
        ]);
    }

    public function count_product_with_foto()
    {
        $directories = Storage::directories('public/foto');

        foreach ($directories as $directory) {
            $files = Storage::files($directory);
            if (count($files) == 0) {
                Storage::deleteDirectory($directory);
            }
        }

        $directories = Storage::directories('public/foto');
        dd($directories);
    }

    public function not_found_rezults()
    {
        return view('myhelp.notfound');
    }

    public function vitra_count()
    {
        $vitra = Product::where('Producer_Brand', 'Vitra')->get();
        dd($vitra);
    }

    public function price_list_60x60_60x120()
    {
        $products = Product::where([['Producer_Brand', 'Laparet'],['balance', 1],['Category', 'Керамогранит'],['Lenght', '>=', 59],['Lenght', '<=', 121],['Height', '>=', 59],['Height', '<=', 61]])->orderBy('Lenght')->orderBy('Name')->get();

        echo '<table>';
        foreach ($products as $product) {
            echo '<tr>';
            echo '<td>'.$product->Name.'</td>'.'<td>'.$product->RMPrice.'</td>';
            if ($product->RMPriceOld) {
                echo '<td>Распродажа</td>';
            } else {
                echo '<td></td>';
            }
            if ($product->Vivod) {
                echo '<td>Вывод из OA</td>';
            } else {
                echo '<td></td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
