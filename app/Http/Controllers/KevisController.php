<?php

namespace App\Http\Controllers;

use App\Imports\KevisImport;
use App\Models\Kevis;
use App\Models\Primavera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class KevisController extends Controller
{
    public function import()
    {
        $name = 'import/kevis/kevis.xlsx';

        Excel::import(new KevisImport(), $name);

        return redirect('/')->with('success', 'All good!');
    }

    public function index()
    {
        $products = Kevis::paginate(15);
//        dd($products);
        return view('kevis.index', compact('products'));
    }

    public function show($id)
    {
        $product = Kevis::find($id);
//        dd($products);
        $imgs = explode(' | ', $product->images);

//        $vendor_code = $product->vendor_code;
////        $path_dir = 'storage/Foto/' . $vendor_code;
////        $directories = Storage::directories('public/Foto');
//        $files = Storage::disk('foto_primavera')->files('/'.$vendor_code);
////        dd($files);
//        $fotossss = $files;
//        $fotos = [];
//        foreach ($fotossss as $f) {
//            $fotos[] = Storage::disk('foto_primavera')->url($f);
//        }

        return view('kevis.show', compact('product', 'imgs'));
    }
}
