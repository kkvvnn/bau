<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductsImport;
use App\Models\Product;
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

    public function index_size(Request $request)
    {
        $type = '';

        $products = Product::where([
            ['Name', 'LIKE', '%керамогранит%'],
            // ['Category', 'LIKE', '%керамогранит%'],
            ['Lenght', $request->lenght],
            ['Height', $request->height],
            // ['Lenght', 80],
            // ['Height', 80],
        ])->orderByDesc('balanceCount')->paginate(15);

        $products->appends(['lenght' => $request->lenght, 'height' => $request->height]);

        // dd($request->height);

        return $this->index($products, $type);
    }

    public function index_plitka()
    {
        $type = 'plitka';

        $products = Product::where([
            ['Name', 'LIKE', '%плитка%'],
            ['Category', 'LIKE', '%плитка%'],
            // ['Lenght', 80],
            // ['Height', 80],
        ])->orderByDesc('Height')->paginate(15);

        return $this->index($products, $type);
    }

    public function index_mosaic()
    {
        $type = 'mosaic';

        $products = Product::where([
            ['Name', 'LIKE', '%мозаика%'],
            ['Category', 'LIKE', '%мозаика%'],
            // ['Lenght', 80],
            // ['Height', 80],
        ])->orderByDesc('Height')->paginate(15);

        return $this->index($products, $type);
    }

    public function index_decor()
    {
        $type = 'decor';

        $products = Product::where([
            ['Name', 'LIKE', '%декор%'],
            // ['Category', 'LIKE', '%мозаика%'],
            // ['Lenght', 80],
            // ['Height', 80],
        ])->orderByDesc('Height')->paginate(15);

        return $this->index($products, $type);
    }

    public function index_all()
    {
        $type = config('app.name');

        $products = Product::where([['GroupProduct', '01 Плитка'],
            ['balanceCount', '>=', 0],
            ['Picture', '!=', ''],
            ])
            ->orderByRaw('Lenght * Height DESC')
            ->paginate(15);

        return $this->index($products, $type);
    }

    public function laparet()
    {
        $type = 'Laparet';

        $products = Product::where([
            ['GroupProduct', '01 Плитка'],
            ['Producer_Brand', 'Laparet'],
            ['RMPrice', '!=', ''],
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
        $products = Product::where([['GroupProduct', '02 Сантехника'],
            ['balanceCount', '>', 0],
            ['RMPrice', '>', 0],
            ['Picture', '!=', ''],
            ])
            ->orderByDesc('Category')
            ->paginate(15);
        return $this->index($products, $type);
    }

    public function index_vivod()
    {
        $type = 'vivod';

        $products = Product::where([['balanceCount', '>', 0], ['Vivod', 1], ['Lenght', '>=', 57], ['Height', '>=', 57]])->orderByRaw('balanceCount DESC')->paginate(15);
//        $products = Product::where([['balanceCount', '>=', 0], ['Vivod', 1], ['Lenght', '>=', 60], ['Height', '>=', 60]])->orderByRaw('Lenght * Height DESC')->orderByRaw('balanceCount DESC')->get();
//        dd($products);
//        foreach ($products as $product) {
//            echo $product->Name.'<br>';
//        }
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 800], ['Name', 'LIKE', '%ерамогранит%']])->paginate(15);
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 500], ['Name', 'LIKE', '%литка%']])->paginate(15);
        // $products = Product::where('balanceCount', '>', 20)->orderByRaw('(RMPrice - Price) DESC')->paginate(15);
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

    public function index_min($count = 0)
    {
        $type = 'vivod';

        $products = Product::where([['balanceCount', '>', 0], ['Lenght', '>=', 60], ['Height', '>=', 60], ['balanceCount', '>=', $count]])->orderByRaw('RMPrice')->paginate(15);
//        $products = Product::where([['balanceCount', '>=', 0], ['Vivod', 1], ['Lenght', '>=', 60], ['Height', '>=', 60]])->orderByRaw('Lenght * Height DESC')->orderByRaw('balanceCount DESC')->get();
//        dd($products);
//        foreach ($products as $product) {
//            echo $product->Name.'<br>';
//        }
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 800], ['Name', 'LIKE', '%ерамогранит%']])->paginate(15);
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 500], ['Name', 'LIKE', '%литка%']])->paginate(15);
        // $products = Product::where('balanceCount', '>', 20)->orderByRaw('(RMPrice - Price) DESC')->paginate(15);
        return $this->index($products, $type);
    }

    public function index_no_vivod()
    {
        $type = 'vivod';

        $products = Product::where([['balanceCount', '>=', 0], ['Vivod', null]])->orderByRaw('Lenght * Height DESC')->orderByRaw('balanceCount DESC')->paginate(15);
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 800], ['Name', 'LIKE', '%ерамогранит%']])->paginate(15);
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 500], ['Name', 'LIKE', '%литка%']])->paginate(15);
        // $products = Product::where('balanceCount', '>', 20)->orderByRaw('(RMPrice - Price) DESC')->paginate(15);
        return $this->index($products, $type);
    }

    public function index_sale()
    {
        $type = 'sale';

        $products = Product::whereRaw('(RMPriceOld - RMPrice) > 0')->whereRaw('balanceCount > 10')->whereRaw('Name not like "%екор%"')->whereRaw('Name not like "%ордюр%"')->orderByRaw('Lenght * Height DESC')->paginate(15);
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 800], ['Name', 'LIKE', '%ерамогранит%']])->paginate(15);
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 500], ['Name', 'LIKE', '%литка%']])->paginate(15);
        // $products = Product::where('balanceCount', '>', 20)->orderByRaw('(RMPrice - Price) DESC')->paginate(15);
        return view('product.sale', [
            'products' => $products,
        ]);
    }

    public function index_ker($price = 800, $count = 10)
    {
        $type = 'all';

        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 800], ['Name', 'LIKE', '%ерамогранит%']])->paginate(15);
        $products = Product::where([['balanceCount', '>', $count], ['Price', '<', $price], ['Name', 'LIKE', '%ерамогранит%']])->paginate(15);

        return $this->index($products, $type);
    }

    public function index_plit($price = 500, $count = 10)
    {
        $type = 'all';

        $products = Product::where([['balanceCount', '>', $count], ['Price', '<', $price], ['Name', 'LIKE', '%литка%']])->paginate(15);

        return $this->index($products, $type);
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

    public function mydown($name, $public_n)
    {
        set_time_limit(600);
        if ($name == null) {
            return;
        }
        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
        $name_file = Str::remove($string_for_delete, $name);

        if ($name_file == null) {
            return;
        }

        if (Storage::disk('public')->missing($public_n.'/'.$name_file)) {

            $file = Storage::disk('ftp')->get($name_file);
            if ($file != null) {
                Storage::disk('public')->put($public_n.'/'.$name_file, $file);
            }
        }
    }
}
