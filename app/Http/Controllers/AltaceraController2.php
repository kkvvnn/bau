<?php

namespace App\Http\Controllers;

use App\Models\Altacera\AltaceraBalance;
use App\Models\Altacera\AltaceraTovar;
use App\Models\Altacera\AltaceraTovarAvailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AltaceraController2 extends Controller
{
    public function index()
    {
        $products = AltaceraTovarAvailable::paginate(15);

        return view('altacera.index', [
            'products' => $products,
        ]);

    }

    public function show($id)
    {
        $product = AltaceraTovarAvailable::find($id);

        $vendor_code = $product->artikul;
//        $path_dir = 'storage/Foto/' . $vendor_code;
//        $directories = Storage::directories('public/Foto');
        $files = Storage::disk('foto_altacera')->files('/' . $vendor_code);
//        dd($files);
        $fotossss = $files;
        $fotos = [];
        foreach ($fotossss as $f) {
            $fotos[] = Storage::disk('foto_altacera')->url($f);
        }

        return view('altacera.show', [
            'product' => $product,
            'fotos' => $fotos,
        ]);
    }
}
