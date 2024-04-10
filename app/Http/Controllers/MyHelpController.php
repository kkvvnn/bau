<?php

namespace App\Http\Controllers;

use App\Models\Altacera\AltaceraTovar;
use App\Models\Altacera\AltaceraTovarAvailable;
use App\Models\Kevis;
use App\Models\LeedoProduct;
use App\Models\NTCeramic\NtCeramicNoImgs;
use App\Models\Primavera;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Table;

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
        $products = Product::where([['Producer_Brand', 'Laparet'], ['balance', 1], ['Category', 'Керамогранит'], ['Lenght', '>=', 59], ['Lenght', '<=', 121], ['Height', '>=', 59], ['Height', '<=', 61]])->orderBy('Lenght')->orderBy('Name')->get();

        echo '<table>';
        foreach ($products as $product) {
            echo '<tr>';
            echo '<td>' . $product->Name . '</td>' . '<td>' . $product->RMPrice . '</td>';
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

    public function nt_prim_ruspl()
    {
        $products = NtCeramicNoImgs::all();

        echo "==================NT-CERAMIC============================" . '<br>';
        foreach ($products as $product) {
            echo $product->vendor_code . ' ' . $product->title . '<br>';
        }

        echo '<br>';
        $products = Primavera::all();

        echo "==================PRIMAVERA============================" . '<br>';
        foreach ($products as $product) {
            echo $product->vendor_code . ' ' . str_replace('Керамогранит', '', $product->title_avito) . '<br>';
        }

        echo '<br>';
        $products = \App\Models\Rusplitka\Product::all();

        echo "==================RUSPLITKA============================" . '<br>';
        foreach ($products as $product) {
            echo $product->name . '<br>';
        }
    }

    public function calacatta_all()
    {
        $products = Product::all();

        echo '<table>';
        echo '<tr><th>BAUSERVICE</th><th>Цена</th></tr>';
        foreach ($products as $product) {
            if (strpos($product->Name, 'alacatta') !== false) {
                echo '<tr>';
                echo '<td>' . $product->Name . '</td><td>' . $product->RMPrice . '</td>';
                echo '</tr>';
            }

        }
        echo '</table>';
        echo '<br>';

        $products = AltaceraTovarAvailable::all();

        echo '<table>';
        echo '<tr><th>ALTACERA</th><th>Цена</th></tr>';
        foreach ($products as $product) {
            if (strpos($product->tovar, 'alacatta') !== false) {
                echo '<tr>';
                echo '<td>' . $product->tovar . '</td><td>' . $product->price->price . '</td>';
                echo '</tr>';
            }

        }
        echo '</table>';
        echo '<br>';

        $products = NtCeramicNoImgs::all();

        echo '<table>';
        echo '<tr><th>NtCeramic</th><th>Цена</th></tr>';
        foreach ($products as $product) {
            if (strpos($product->title, 'alacatta') !== false) {
                echo '<tr>';
                echo '<td>' . $product->title . ' ' . $product->vendor_code . ' ' . $product->size_cm . '</td><td>' . $product->price . '</td>';
                echo '</tr>';
            }

        }
        echo '</table>';
        echo '<br>';

        $products = Primavera::all();

        echo '<table>';
        echo '<tr><th>Primavera</th><th>Цена</th></tr>';
        foreach ($products as $product) {
            if (strpos($product->title, 'alacatta') !== false) {
                echo '<tr>';
                echo '<td>' . $product->title . '</td><td>' . $product->price . '</td>';
                echo '</tr>';
            }

        }
        echo '</table>';
        echo '<br>';

        $products = Kevis::all();

        echo '<table>';
        echo '<tr><th>Kevis</th><th>Цена</th></tr>';
        foreach ($products as $product) {
            if (strpos($product->title, 'alacatta') !== false) {
                echo '<tr>';
                echo '<td>' . $product->title . '</td><td>' . $product->price . '</td>';
                echo '</tr>';
            }

        }
        echo '</table>';
        echo '<br>';

        $products = \App\Models\Rusplitka\Product::all();

        echo '<table>';
        echo '<tr><th>Rusplitka</th><th>Цена</th></tr>';
        foreach ($products as $product) {
            if (strpos($product->name, 'alacatta') !== false) {
                echo '<tr>';
                echo '<td>' . $product->name . '</td><td>' . $product->price_rozn . '</td>';
                echo '</tr>';
            }

        }
        echo '</table>';
        echo '<br>';
    }

    public function leedo_all()
    {
        $products = LeedoProduct::all();

        echo '<table>';
        echo '<tr><th>Коллекция</th><th>Название</th><th>Цена</th><th>Закупка</th><th>В упаковке штук</th><th>Остаток</th></tr>';
        foreach ($products as $product) {
                echo '<tr>';
                echo '<td>' . $product->Collection.'</td><td>' .$product->Item_name. '</td><td>' . $product->Price_rozn . '</td>';
                echo '<td>' . $product->Price_OPT.'</td><td>' .$product->Pcs_per_box. '</td><td>' . $product->Sklad_Msk_LeeDo . '</td>';
                echo '</tr>';

        }
        echo '</table>';
        echo '<br>';
    }

    public function not_in_moscow()
    {
        $products = Product::where([['Producer_Brand', 'Laparet'], ['GroupProduct', '01 Плитка']])
            ->orderByRaw('Lenght * Height DESC')
            ->get()
            ->reject(function (Product $product) {
                if (isset($product->kzn)) {
                    return ($product->balanceCount > 0 || $product->kzn->balanceCount <= 0);
                } else {
                    return true;
                }
            });

        return view('product.index', [
            'products' => $products,
        ]);
    }


    public function laparet2($size = '')
    {
        $laparet_all_tiles = Product::all()
            ->filter(function (Product $product) {
                return $product->Producer_Brand == 'Laparet';
            })
            ->filter(function (Product $product) {
                return $product->GroupProduct == '01 Плитка';
            });


        $available_in_msk_kzn_spb = $laparet_all_tiles
            ->filter(function (Product $product) {
                if (isset($product->kzn) && isset($product->spb)) {
                    return $product->balance == 1 || $product->kzn->balance == 1 || $product->spb->balance == 1;
                } else {
                    return $product->balance == 1;
                }
            });

        $laparet_filtered = $available_in_msk_kzn_spb
            ->filter(function (Product $product) {
                return $product->RMPrice >= 700;
            })
            ->filter(function (Product $product) {
                return $product->RMPrice > $product->Price;
            })
            ->filter(function (Product $product) {
                return $product->Picture != '';
            })
            ->sortByDesc('RMPrice');

        $products = [];
        if ($size == '') {
            $products = $laparet_filtered;
        } elseif ($size == '60x60') {
            $products = $laparet_filtered
                ->filter(function (Product $product) {
                    $length = (int) $product->Lenght;
                    $height = (int) $product->Height;
                    return $length >= 59 && $length <= 61 && $height >= 59 && $height <= 61;
                });
        } elseif ($size == '60x120') {
            $products = $laparet_filtered
                ->filter(function (Product $product) {
                    $length = (int)$product->Lenght;
                    $height = (int)$product->Height;
                    return $length >= 119 && $length <= 121 && $height >= 59 && $height <= 61;
                });
        } elseif ($size == '80x80') {
            $products = $laparet_filtered
                ->filter(function (Product $product) {
                    $length = (int)$product->Lenght;
                    $height = (int)$product->Height;
                    return $length >= 79 && $length <= 81 && $height >= 79 && $height <= 81;
                });
        }





//        dd($products);

        return view('product.index', [
            'products' => $products,
        ]);
    }

    public function laparet(string $brand, string $size)
    {
        $size = explode('x', $size);
        if (count($size) != 2 || $size[1] == null) {
            abort(404);
        }
        $h = (int)$size[0];
        $l = (int)$size[1];

        $brand = ucfirst(strtolower($brand));


//        $bau_all_tiles = Product::all()
//            ->filter(function (Product $product) use ($brand) {
//                return $product->Producer_Brand == $brand;
//            })
//            ->filter(function (Product $product) {
//                return $product->GroupProduct == '01 Плитка';
//            });

        $bau_all_tiles = Product::where('Producer_Brand', '=', $brand)
            ->where('GroupProduct', '=', '01 Плитка')
            ->where('RMPrice', '>=', 700)
            ->where('Picture', '!=', null)
            ->whereColumn('RMPrice', '>', 'Price')
            ->get()
            ->sortByDesc('RMPrice');;



        $available_in_msk_kzn_spb = $bau_all_tiles
            ->filter(function (Product $product) {
                if (isset($product->kzn) && isset($product->spb)) {
                    return $product->balance == 1 || $product->kzn->balance == 1 || $product->spb->balance == 1;
                } elseif (isset($product->kzn)){
                    return $product->balance == 1 || $product->kzn->balance == 1;
                } elseif (isset($product->spb)){
                    return $product->balance == 1 || $product->spb->balance == 1;
                } else {
                    return $product->balance == 1;
                }
            });



        $products = $available_in_msk_kzn_spb
            ->filter(function (Product $product) use ($l, $h) {
                $length = (int) $product->Lenght;
                $height = (int) $product->Height;
                return ($length >= --$l && $length <= ++$l && $height >= --$h && $height <= ++$h)
                    || ($length >= --$h && $length <= ++$h && $height >= --$l && $height <= ++$l);
            });





//        dd($products);

        return view('product.index', [
            'products' => $products,
        ]);
    }
}
