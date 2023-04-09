<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::all();
        // $users = User::where('votes', '>', 100)->paginate(15);
       
        // $products = Product::where([ 
        //         ['Lenght', 120], 
        //         ['Height', 60],
        //     ])->paginate(6);

        $products = Product::paginate(15);

        return view('product.index2', [
            'products' => $products
        ]);
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
    public function show(Product $product)
    {
        //
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
