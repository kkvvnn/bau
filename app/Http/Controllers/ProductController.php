<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\CollectionProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($products, $type)
    {
        // $products = Product::all();
        // $users = User::where('votes', '>', 100)->paginate(15);







        return view('product.index2', [
            'products' => $products
        ]);
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

        $products = Product::where('balanceCount', '>', 2)->orderByDesc('Height')->paginate(15);
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
        $name = '%' . $name . '%';

        $products = Product::where([
            ['Name', 'LIKE', $name],
            // ['Category', 'LIKE', '%мозаика%'],
            // ['Lenght', 80], 
            // ['Height', 80],
        ])->orderByDesc('Height')->paginate(15);

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
        $product = Product::findOrFail($id);
        $collection = $product->collections;

        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
        $name_file = Str::remove($string_for_delete, $product->Picture);
        $url = Storage::url($name_file);

        return view('product.show', [
            'product' => $product,
            'url' => $url,
            'collection' => $collection,
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
        // Product::truncate();    // clear all data in table   

        $url = "http://catalog.bauservice.ru/affiliate_new/xQ0ZYpzr.csv";
        $contents = file_get_contents($url);
        $contents = mb_convert_encoding($contents, "UTF-8", "WINDOWS-1251");

        $date = date("Y-m-d_His");
        $name = 'import/products/product_' . $date . '.csv';

        Storage::put($name, $contents);

        Excel::import(new ProductsImport, $name);
        $deleted = Product::where('Picture', null)->delete();

        return redirect('/')->with('success', 'All good!');
    }
}
