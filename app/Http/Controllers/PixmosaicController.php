<?php

namespace App\Http\Controllers;

use App\Imports\PixmosaicsImport;
use App\Imports\PrimaverasImport;
use App\Models\Pixmosaic;
use App\Models\Primavera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PixmosaicController extends Controller
{
    public function import()
    {
        Pixmosaic::truncate();

        $name = 'import/pixmosaic/pix_all.xlsx';

        Excel::import(new PixmosaicsImport(), $name);

        return redirect('/')->with('success', 'All good!');
    }

    public function index()
    {
        $products = Pixmosaic::paginate(15);
//        dd($products);
        return view('pixmosaic.index', compact('products'));
    }

    public function show($id)
    {
        $product = Pixmosaic::find($id);
//        dd($products);

        $vendor_code = $product->vendor_code;
//        $path_dir = 'storage/Foto/' . $vendor_code;
//        $directories = Storage::directories('public/Foto');
        $files = Storage::disk('foto_pixmosaic')->files('/'.$vendor_code);
//        dd($files);
        $fotossss = $files;
        $fotos = [];
        foreach ($fotossss as $f) {
            $fotos[] = Storage::disk('foto_pixmosaic')->url($f);
        }

        return view('pixmosaic.show', compact('product', 'fotos'));
    }
}
