<?php

namespace App\Http\Controllers;

use App\Imports\CollectionsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

use App\Models\Collection;
use App\Models\Product;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        foreach ($products as $product) {
            // $collects[] = $product->collections[0]->Collection_Name;
            $collects[] = $product->collections[0]->Collection_Name . $product->collections[0]->Collection_Id;
        }

        // dd($collects);
        $collects = array_unique($collects);
        $collects = Arr::sort($collects);


        return view('collection.index', [
            'collects' => $collects,
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
    public function store(StoreCollectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        //
    }

    // IMPORT COLLECTIONS
    public function import()
    {
        $url = "http://catalog.bauservice.ru/affiliate_new/nCatg0d8.csv";
        $contents = file_get_contents($url);
        $contents = mb_convert_encoding($contents, "UTF-8", "WINDOWS-1251");

        $date = date("Y-m-d_His");
        $name = 'import/collections/collection_' . $date . '.csv';

        Storage::put($name, $contents);

        Excel::import(new CollectionsImport, $name);

        return redirect('/')->with('success', 'All good!');
    }
}
