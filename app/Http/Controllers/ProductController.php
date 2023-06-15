<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index_full()
    {
        $type = '';

        $products = Product::where([
            ['Name', 'LIKE', '%керамогранит%'],
            ['Category', 'LIKE', '%керамогранит%'],
            // ['Lenght', 80],
            // ['Height', 80],
        ])->orderByDesc('Height')->paginate(15);

        return view('index-full', [
            'products' => $products,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index($products, $type)
    {
        // $products = Product::all();
        // $users = User::where('votes', '>', 100)->paginate(15);

        return view('product.index', [
            'products' => $products,
        ]);
    }

    public function cersanit()
    {
        $products = Product::where('Producer_Brand', 'Cersanit')->orderBy('Name')->get();

        foreach ($products as $product) {

            $collection = $product->collections;
            $title = $product->Producer_Brand.' '.$collection[0]->Collection_Name.' '.$product->Owner_Article;

            echo $title.'<br>';
        }
    }

    public function index_keramogranit()
    {
        $type = 'keramogranit';

        $products = Product::where([
            ['Name', 'LIKE', '%керамогранит%'],
            ['Category', 'LIKE', '%керамогранит%'],
            // ['Lenght', 80],
            // ['Height', 80],
        ])->orderByDesc('Height')->paginate(15);

        return $this->index($products, $type);
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
        $type = 'all';

        $products = Product::where('balanceCount', '>=', 0)->orderByDesc('Height')->paginate(15);
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 800], ['Name', 'LIKE', '%ерамогранит%']])->paginate(15);
        // $products = Product::where([['balanceCount', '>', 30], ['Price', '<', 500], ['Name', 'LIKE', '%литка%']])->paginate(15);
        // $products = Product::where('balanceCount', '>', 20)->orderByRaw('(RMPrice - Price) DESC')->paginate(15);
        return $this->index($products, $type);
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

        $products = Product::where('Name', 'LIKE', $name)->orWhere('Producer_Brand', 'LIKE', $name)->orderByDesc('balanceCount')->paginate(15);

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

    public function collection_name($id)
    {
        $type = 'collection_name';

        $products = Product::where([
            ['Collection_Id', 'LIKE', $id],
            // ['Category', 'LIKE', '%керамогранит%'],
            // ['Lenght', 80],
            // ['Height', 80],
        ])->orderByDesc('Height')->paginate(15);

        return $this->index($products, $type);
    }

    /**
     * Display the specified resource.
     */
    public function show($id = 1)
    {
        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';

        $product = Product::findOrFail($id);
        $collection = $product->collections;

        $url_collection = $collection[0]->Interior_Pic;

        $url_collection = explode(', ', $url_collection);

        $urls_c = [];
        foreach ($url_collection as $kkkj) {
            $urls_c[] = Str::remove($string_for_delete, $kkkj);
        }

        // dd($urls_c);

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

        // $name_file = Str::remove($string_for_delete, $product->Picture);
        // $name_file2 = Str::remove($string_for_delete, $product->Picture2);

        $urls_2 = [];
        foreach ($name_files as $key => $value) {
            $urls_2[] = Storage::url($key.'/'.$value);
        }

        // dd($urls_2);
        // $urls = [];
        // foreach ($urls_2 as $url) {
        //     $urls[] = Str::replace('/storage' , '/img', $url);
        // }
        // dd($urls);
        // $url1 = Storage::url('Picture1/' . $name_file);
        // $url2 = Storage::url('Picture2/' . $name_file2);

        $vendor_code = str_replace('х', '', $product->Element_Code);
//        $path_dir = 'storage/Foto/' . $vendor_code;
//        $directories = Storage::directories('public/Foto');
        $files = Storage::disk('foto')->files('/'.$vendor_code);
//        dd($files);
        $fotossss = $files;
        $fotos = [];
        foreach ($fotossss as $f) {
            $fotos[] = Storage::disk('foto')->url($f);
        }
//dd($fotos);
        return view('product.show', [
            'product' => $product,
            'urls' => $urls_2,
            // 'url2' => $url2,
            'collection' => $collection,
            'url_collection' => $urls_c,
            'fotos' => $fotos,
        ]);
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

    // IMPORT PRODUCTS
    public function import()
    {
        Product::truncate();    // clear all data in table

        set_time_limit(60);
        $url = 'http://catalog.bauservice.ru/affiliate_new/xQ0ZYpzr.csv';
        $contents = file_get_contents($url);
        $contents = mb_convert_encoding($contents, 'UTF-8', 'WINDOWS-1251');

        $date = date('Y-m-d_His');
        $name = 'import/products/product_'.$date.'.csv';

        // dd($name);

        Storage::put($name, $contents);

        Excel::import(new ProductsImport, $name);
        $deleted = Product::where('Picture', null)->delete();

        return redirect('/')->with('success', 'All good!');
    }

    public function mydown($name, $public_n)
    {
        set_time_limit(600);
        // $disk = 'public' . $public_n;
        if ($name == null) {
            return;
        }
        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
        $name_file = Str::remove($string_for_delete, $name);

        // $name_file = '';
        // $name_file = 'Picture2/' . $name_file;

        // dd($name_file);
        // echo $name_file;
        // echo '<br>';

        //        $name_file = 'c8b0ef73-19ed-11e3-a4c8-005056ad2cf4___0002.jpg';

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

    public function download_all($disk = 1)
    {

        if ($disk == 1) {
            $where_pic = '';
        } else {
            $where_pic = $disk;
        }

        // $name_file = 'small_img/' . $name_file;
        // $products = Product::where([['id', '<=', 400], ['id', '!=', 226], ['Picture2', '!=', null]])->get();
        // $products = Product::where([['id', '<', 2000], ['Picture2', '!=', null]])->get();
        $products = Product::where(('Picture'.$where_pic), '!=', null)->get();
        // dd($products);

        $product_pic = 'Picture'.$where_pic;

        // dd($product_pic);
        set_time_limit(600);

        foreach ($products as $product) {
            // dd($product->Picture{$where_pic});
            $this->mydown($product->$product_pic, $product_pic);
        }

        // $url = Storage::url($name_file);
        // $url_small = Storage::url('small_img/' . $name_file);
        // // $url = Storage::url($name_file);

        // // use Illuminate\Support\Str;

        // $url_small = Str::swap([
        //   '.jpeg' => '.jpg',
        //   '.png' => '.jpg',
        //   // 'great' => 'fantastic',
        // ], $url_small);
    }
}
