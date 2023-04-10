<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($products)
    {
        // $products = Product::all();
        // $users = User::where('votes', '>', 100)->paginate(15);
       
        

        

        

        return view('product.index2', [
            'products' => $products
        ]);
    }

    public function index_keramogranit()
    {
        $products = Product::where([ 
                ['Name', 'LIKE', '%керамогранит%'],
                ['Category', 'LIKE', '%керамогранит%'],
                // ['Lenght', 80], 
                // ['Height', 80],
            ])->paginate(15);
        
            return $this->index($products);
    }

    public function index_plitka()
    {
        $products = Product::where([ 
                ['Name', 'LIKE', '%плитка%'],
                ['Category', 'LIKE', '%плитка%'],
                // ['Lenght', 80], 
                // ['Height', 80],
            ])->paginate(15);
        
            return $this->index($products);
    }

    public function index_mosaic()
    {
        $products = Product::where([ 
                ['Name', 'LIKE', '%мозаика%'],
                ['Category', 'LIKE', '%мозаика%'],
                // ['Lenght', 80], 
                // ['Height', 80],
            ])->paginate(15);
        
            return $this->index($products);
    }

    public function index_decor()
    {
        $products = Product::where([ 
                ['Name', 'LIKE', '%декор%'],
                // ['Category', 'LIKE', '%мозаика%'],
                // ['Lenght', 80], 
                // ['Height', 80],
            ])->paginate(15);
        
            return $this->index($products);
    }

    public function index_all()
    {
        $products = Product::paginate(15);
        return $this->index($products);
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

    /**
     * Display the specified resource.
     */
    public function show($id = 1)
    {
        $product = Product::findOrFail($id);

        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
        $name_file = Str::remove($string_for_delete, $product->Picture);
        $url = Storage::url($name_file); 

        return view('product.show', [
            'product' => $product,
            'url' => $url,
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

        Excel::import(new ProductsImport, 'product.csv');
        $deleted = Product::where('Picture', null)->delete();
        
        return redirect('/')->with('success', 'All good!');
    }
}
