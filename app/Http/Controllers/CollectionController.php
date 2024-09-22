<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Imports\CollectionsImport;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

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
}
