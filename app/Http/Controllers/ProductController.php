<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($products, $type): View
    {
        if (!$type) {
            $type = config('app.name');
        }

        return view('product.index', [
            'products' => $products,
            'type' => $type,
        ]);
    }


    public function index_all()
    {
        $type = config('app.name');

        $products = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Laparet'],
            ['balanceCount', '>', 0],
            ['Picture', '!=', ''],
            ])
            ->orderByRaw('Lenght * Height DESC')
            ->orderBy('RMPrice')
            ->paginate(15);

        return $this->index($products, $type);
    }

    public function laparet()
    {
        $type = 'Laparet';

        $products = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Laparet'],
            ['balanceCount', '>', 0],
            ['RMPrice', '!=', ''],
            ['Picture', '!=', ''],
        ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->orderByRaw('Lenght * Height DESC')
            ->paginate(15);

        return $this->index($products, $type);
    }

    public function index_spb()
    {
        $type = 'SPB';

        $products = Product::with('spb')
            ->whereHas('spb', function ($spb) {
                $spb->where('balanceCount', '>', 1);
            })
            ->where(function (Builder $query) {
                $query->where('Producer_Brand', 'Laparet');
                $query->orWhere('Producer_Brand', 'Ceradim');
            })
            ->where([
                ['GroupProduct', '01 Плитка'],
                ['RMPrice', '>=', '900'],
                ['Picture', '!=', ''],
            ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->orderByRaw('Lenght * Height DESC')
            ->paginate(15);

        return $this->index($products, $type);
    }

    public function cersanit()
    {
        $type = 'Cersanit';

        $products = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Cersanit'],
            ['balanceCount', '>', 0],
            ['RMPrice', '!=', ''],
            ['Picture', '!=', ''],
        ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->orderByRaw('Lenght * Height DESC')
            ->paginate(15);

        return $this->index($products, $type);
    }

    public function vitra()
    {
        $type = 'Vitra';

        $products = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Vitra'],
            ['balanceCount', '>', 0],
            ['RMPrice', '!=', ''],
            ['Picture', '!=', ''],
        ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->orderByRaw('Lenght * Height DESC')
            ->paginate(15);

        return $this->index($products, $type);
    }

    public function index_santech()
    {
        $type = 'santech';
        $products = Product::where([
            ['GroupProduct', '02 Сантехника'],
            ['balanceCount', '>', 0],
            ['RMPrice', '>', 0],
            ['Picture', '!=', ''],
            ])
            ->orderByDesc('Category')
            ->paginate(15);
        return $this->index($products, $type);
    }
    public function water_mixers()
    {
        $type = 'water_mixers';
        $products = Product::where([
            ['GroupProduct', '02 Сантехника'],
            ['balanceCount', '>', 0],
            ['RMPrice', '>', 0],
            ['Picture', '!=', ''],
            ['Category', 'Смесители'],
            ])
            ->orderByDesc('Place_in_the_Collection')
            ->paginate(15);
        return $this->index($products, $type);
    }


    public function index_ceradim()
    {
        $type = 'Ceradim';


         $products = Product::where([
             ['Producer_Brand', 'Ceradim'],
             ['Picture', '!=', ''],
             ])
             ->paginate(15);
//         dd($products);

        return $this->index($products, $type);
    }

    public function index_ceradim_table()
    {
        $ceradims = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],
            ['balanceCount', '>=', 1],
            ['RMPrice', '!=', ''],
            ['Picture', '!=', ''],
        ])
            ->where(function (Builder $query) {
                $query->where('Producer_Brand', 'Ceradim');
            })
            ->whereColumn('RMPrice', '>', 'Price')

            ->orderByDesc('Lenght')
            ->orderBy('Name')
            ->get()
            ->filter(function (Product $product) {
                $length = (int)$product->Lenght;
                $height = (int)$product->Height;
                return ($length >= 119 && $length <= 121 && $height >= 59 && $height <= 61)         //60x120
                    || ($length >= 59 && $length <= 61 && $height >= 59 && $height <= 61)           //60x60
                    || ($length >= 79 && $length <= 81 && $height >= 79 && $height <= 81)           //80x80
                    || ($length >= 49 && $length <=51 && $height >= 49 && $height <= 51);           //50x50
            });

        return view('help.list', [
            'products' => $ceradims,
        ]);
    }

    public function index_kerama_marazzi()
    {
        $type = 'Kerama Marazzi';


//         $products = Product::where([
//             ['Producer_Brand', 'Kerama Marazzi'],
//             ['Picture', '!=', ''],
//             ])
//             ->paginate(15);
//         dd($products);

        $products = Product::where([['GroupProduct', '01 Плитка'],
            ['Producer_Brand', '=', 'Kerama Marazzi'],
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],
            ['balance', 1],
            ['RMPrice', '>=', '650'],
            ['RMPrice', '!=', ''],
            ['Picture', '!=', ''],
        ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->orderByRaw('Lenght * Height DESC')
            ->paginate(15);

        return $this->index($products, $type);
    }

    public function index_kerama_marazzi_keramogranit()
    {
        $type = 'Kerama Marazzi';


//         $products = Product::where([
//             ['Producer_Brand', 'Kerama Marazzi'],
//             ['Picture', '!=', ''],
//             ])
//             ->paginate(15);
//         dd($products);

        $products = Product::where([['GroupProduct', '01 Плитка'],
            ['Producer_Brand', '=', 'Kerama Marazzi'],
            ['Category', '=', 'Керамогранит'],
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],
            ['Name', 'not like', '%Декор%'],
            ['balanceCount', '>=', 5],
            ['Lenght', '>=', 50],
            ['RMPrice', '>=', '650'],
            ['RMPrice', '!=', ''],
            ['Picture', '!=', ''],
        ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->orderByRaw('Lenght * Height DESC')
            ->paginate(15);

        return $this->index($products, $type);
    }

    public function kerama_marazzi_test()
    {
        $type = 'Kerama Marazzi';

        $kerama_marazzi = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Kerama Marazzi'],
            ['Picture', '!=', ''],
            ['RMPrice', '>=', '500'],
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],

//            ['Element_Code', '!=', 'х9999999999'],
        ])
            ->whereColumn('RMPrice', '>', 'Price')
            ->get()

            ->filter(function (Product $product) {
                $length = (float)$product->Lenght;
                $height = (float)$product->Height;

                if ($length < $height) {
                    $temp = $length;
                    $length = $height;
                    $height = $temp;
                }

                return ($length >= 119 && $length <= 121 && $height >= 59 && $height <= 61)         //60x120
                    || ($length >= 59 && $length <= 61 && $height >= 59 && $height <= 61)           //60x60
                    || ($length >= 79 && $length <= 81 && $height >= 79 && $height <= 81)           //80x80
                    || ($length >= 159 && $length <= 161 && $height >= 79 && $height <= 81)         //80x160
                    || ($length >= 119 && $length <= 121 && $height >= 19 && $height <= 21)         //20x120
                    || ($length >= 119 && $length <= 121 && $height >= 39 && $height <= 41)         //20x120
                    || ($length == 15 && $height == 7.4);
            });

        $monparnas = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Kerama Marazzi'],
            ['Picture', '!=', ''],
            ['Name', 'like', '%онпарнас%'],
        ])
            ->get();

        $vitrasz = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Kerama Marazzi'],
            ['Picture', '!=', ''],
            ['Name', 'like', '%Витраж%'],
            ['Name', 'not like', '%ставк%'],
            ['Name', 'not like', '%ступен%'],
            ['Name', 'not like', '%пецэлем%'],
            ['Name', 'not like', '%ордюр%'],
        ])
            ->get();

        $kerama_marazzi = $kerama_marazzi->merge($monparnas);
        $kerama_marazzi = $kerama_marazzi->merge($vitrasz);

//        dd($vitrasz);
//        dd($kerama_marazzi);

        return $this->index($kerama_marazzi, $type);
    }


    public function index_sale()
    {
        $type = 'sale';

        $products = Product::whereRaw('(RMPriceOld - RMPrice) > 0')
            ->whereRaw('balanceCount > 10')
            ->whereRaw('Name not like "%екор%"')
            ->whereRaw('Name not like "%ордюр%"')
            ->orderByRaw('Lenght * Height DESC')
            ->paginate(15);
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 800], ['Name', 'LIKE', '%ерамогранит%']])->paginate(15);
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 500], ['Name', 'LIKE', '%литка%']])->paginate(15);
        // $products = Product::where('balanceCount', '>', 20)->orderByRaw('(RMPrice - Price) DESC')->paginate(15);
        return view('product.sale', [
            'products' => $products,
        ]);
    }


    public function search(Request $request)
    {
        $type = 'search';

        $name = $request->input('name');
        $name = '%'.$name.'%';

        $products = Product::where('Name', 'LIKE', $name)->orWhere('Element_Code', 'LIKE', $name)->orderByDesc('balanceCount')->paginate(15);

        $products->appends(['name' => $name]);

        return $this->index($products, $type);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    public function collection_name($slug)
    {
        $type = 'collection_name';
        $type = config('app.name');

//        $products = Product::where([
//            ['Collection_Id', 'LIKE', $id],
//        ])->orderByDesc('Height')->paginate(15);

        $products = Product::whereHas('collections', function ($query) use ($slug) {
            $query->whereSlug($slug);
        })
            ->orderByDesc('Height')
            ->paginate(15);

        return $this->index($products, $type);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug): View
    {
//        dd($slug);
        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';

//        $product = Product::findOrFail($slug);
        $product = Product::whereSlug($slug)->firstOrFail();
//        dd($product);
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

        $vendor_code = str_replace('х', '', $product->Element_Code);

        $files = Storage::disk('foto')->files('/'.$vendor_code);
        $fotossss = $files;
        $fotos = [];
        foreach ($fotossss as $f) {
            $fotos[] = Storage::disk('foto')->url($f);
        }

        if ($product->RMPriceOld > 0) {
            $old_price = $product->RMPriceOld;
        } else {
            $old_price = '';
        }

        $vivod = $product->Vivod;
        if ($vivod == 1) {
            $vivod = 'Вывод из OA';
        } else {
            $vivod = '';
        }
//        -------------------------
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
//        ------------------------------
        if ($product->spb) {
            $stock_spb = $product->spb->balanceCount;
        } else {
            $stock_spb = null;
        }

        if ($product->kzn) {
            $stock_kzn = $product->kzn->balanceCount;
        } else {
            $stock_kzn = null;
        }

        if ($product->GroupProduct != '02 Сантехника') {
            return view('product.show', [
                'product' => $product,
                'stock_spb' => $stock_spb,
                'stock_kzn' => $stock_kzn,
                'urls' => $urls_2,
                // 'url2' => $url2,
                'collection' => $collection,
                'url_collection' => $urls_c,
                'fotos' => $fotos,
                'vivod' => $vivod,
                'old_price' => $old_price,
                'text_color' => $text_color,
            ]);
        } else {
            return view('product.santech.show', [
                'product' => $product,
                'urls' => $urls_2,
                // 'url2' => $url2,
                'collection' => $collection,
                'url_collection' => $urls_c,
                'fotos' => $fotos,
                'vivod' => $vivod,
                'old_price' => $old_price,
                'text_color' => $text_color,
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
