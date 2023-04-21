<?php

namespace App\Http\Controllers;

use App\Imports\CollectionsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


use App\Models\Collection;
use App\Models\Product;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Models\CollectionProduct;

class CollectionController extends Controller
{
    public function all_collections_list()
    {
        $col = [];
        $collectS_id = DB::table('collection_product')
            ->select('collection_id')
            ->distinct()
            ->get();

        foreach ($collectS_id as $collect_id) {
            $col[] = $collect_id->collection_id;
        }

        return $col;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cols = $this->all_collections_list();
        
        $collects = Collection::find($cols);

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

    public function mydown($name)
    {
        set_time_limit(60);
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

        if (Storage::disk('collections')->missing($name_file)) {

            $file = Storage::disk('ftp')->get($name_file);
            if ($file != null) {
                Storage::disk('collections')->put($name_file, $file);
            }
        }
    }

    public function download_all_collections()
    {


        // $name_file = 'small_img/' . $name_file;
        // $products = Product::where([['id', '<=', 400], ['id', '!=', 226], ['Picture2', '!=', null]])->get();
        // $products = Product::where([['id', '<', 2000], ['Picture2', '!=', null]])->get();
        // $products = Product::where('Picture3', '!=', null)->get();
        // dd($products);

        $cols = $this->all_collections_list();
        $collections = Collection::find($cols);
        // dd($collections);

        

        foreach ($collections as $collection) {
            $list_pic = $collection->Interior_Pic;
            $arr_pic = explode(', ', $list_pic);

            // dd($arr_pic[1]);
           
            foreach($arr_pic as $pic) {
                // dd($pic);
                $this->mydown($pic);
            }
            // $this->mydown($arr_pic[1]);
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
