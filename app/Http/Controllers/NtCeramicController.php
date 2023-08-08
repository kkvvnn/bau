<?php

namespace App\Http\Controllers;

use App\Imports\NtCeramicNoImgsImport;
use App\Imports\NtCeramicWithImgsImport;
use App\Models\NTCeramic\NtCeramicNoImgs;
use App\Models\NTCeramic\NtCeramicWithImgs;
use App\Models\Primavera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class NtCeramicController extends Controller
{
    public function import()
    {
        $name_no_imgs = 'import/ntceramic/nt-no-imgs.xlsx';
        $name_with_imgs = 'import/ntceramic/nt-with-imgs.xlsx';

        Excel::import(new NtCeramicNoImgsImport(), $name_no_imgs);
        Excel::import(new NtCeramicWithImgsImport(), $name_with_imgs);

        return redirect('/')->with('success', 'All good!');
    }

    public function index()
    {
        $products = NtCeramicNoImgs::paginate(15);
//        dd($products);
        return view('ntceramic.index', compact('products'));
    }

    public function show($id)
    {
        $product = NtCeramicNoImgs::find($id);
//        dd($products);
        $imgs_2 = [];
        if ($product->referer->img2 != null) {
            $imgs_2[] = $product->referer->img2;
        }
        if ($product->referer->img3 != null) {
            $imgs_2[] = $product->referer->img3;
        }
        if ($product->referer->img4 != null) {
            $imgs_2[] = $product->referer->img4;
        }
        if ($product->referer->img5 != null) {
            $imgs_2[] = $product->referer->img5;
        }
        if ($product->referer->img6 != null) {
            $imgs_2[] = $product->referer->img6;
        }
        if ($product->referer->img7 != null) {
            $imgs_2[] = $product->referer->img7;
        }
        if ($product->referer->img8 != null) {
            $imgs_2[] = $product->referer->img8;
        }
        if ($product->referer->img9 != null) {
            $imgs_2[] = $product->referer->img9;
        }
        if ($product->referer->img10 != null) {
            $imgs_2[] = $product->referer->img10;
        }
        if ($product->referer->img11 != null) {
            $imgs_2[] = $product->referer->img11;
        }
        if ($product->referer->img12 != null) {
            $imgs_2[] = $product->referer->img12;
        }
        if ($product->referer->img13 != null) {
            $imgs_2[] = $product->referer->img13;
        }
        if ($product->referer->img14 != null) {
            $imgs_2[] = $product->referer->img14;
        }
        if ($product->referer->img15 != null) {
            $imgs_2[] = $product->referer->img15;
        }
        if ($product->referer->img16 != null) {
            $imgs_2[] = $product->referer->img16;
        }
        if ($product->referer->img17 != null) {
            $imgs_2[] = $product->referer->img17;
        }
        if ($product->referer->img18 != null) {
            $imgs_2[] = $product->referer->img18;
        }
        if ($product->referer->img19 != null) {
            $imgs_2[] = $product->referer->img19;
        }
        if ($product->referer->img20 != null) {
            $imgs_2[] = $product->referer->img20;
        }
        if ($product->referer->img21 != null) {
            $imgs_2[] = $product->referer->img21;
        }
        if ($product->referer->img22 != null) {
            $imgs_2[] = $product->referer->img22;
        }
        if ($product->referer->img23 != null) {
            $imgs_2[] = $product->referer->img23;
        }
        if ($product->referer->img24 != null) {
            $imgs_2[] = $product->referer->img24;
        }
        if ($product->referer->img25 != null) {
            $imgs_2[] = $product->referer->img25;
        }
        if ($product->referer->img26 != null) {
            $imgs_2[] = $product->referer->img26;
        }
        if ($product->referer->img27 != null) {
            $imgs_2[] = $product->referer->img27;
        }
        if ($product->referer->img28 != null) {
            $imgs_2[] = $product->referer->img28;
        }
        if ($product->referer->img29 != null) {
            $imgs_2[] = $product->referer->img29;
        }
        if ($product->referer->img30 != null) {
            $imgs_2[] = $product->referer->img30;
        }
        if ($product->referer->img31 != null) {
            $imgs_2[] = $product->referer->img31;
        }
        if ($product->referer->img32 != null) {
            $imgs_2[] = $product->referer->img32;
        }
        if ($product->referer->img33 != null) {
            $imgs_2[] = $product->referer->img33;
        }
        if ($product->referer->img34 != null) {
            $imgs_2[] = $product->referer->img34;
        }
        if ($product->referer->img35 != null) {
            $imgs_2[] = $product->referer->img35;
        }
        if ($product->referer->img36 != null) {
            $imgs_2[] = $product->referer->img36;
        }
        if ($product->referer->img37 != null) {
            $imgs_2[] = $product->referer->img37;
        }
        if ($product->referer->img38 != null) {
            $imgs_2[] = $product->referer->img38;
        }
        if ($product->referer->img39 != null) {
            $imgs_2[] = $product->referer->img39;
        }
        if ($product->referer->img40 != null) {
            $imgs_2[] = $product->referer->img40;
        }
        if ($product->referer->img41 != null) {
            $imgs_2[] = $product->referer->img41;
        }
        if ($product->referer->img42 != null) {
            $imgs_2[] = $product->referer->img42;
        }
//        $imgs_2 = $product->img2;
//        $imgs_2 = explode("\n", $imgs_2);

        $vendor_code = $product->vendor_code;
//        $path_dir = 'storage/Foto/' . $vendor_code;
//        $directories = Storage::directories('public/Foto');
        $files = Storage::disk('foto_ntceramic')->files('/'.$vendor_code);
//        dd($files);
        $fotossss = $files;
        $fotos = [];
        foreach ($fotossss as $f) {
            $fotos[] = Storage::disk('foto_ntceramic')->url($f);
        }

        return view('ntceramic.show', compact('product', 'imgs_2', 'fotos'));
    }
}
