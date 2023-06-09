<?php

namespace App\Http\Controllers;

use App\Imports\PrimaverasImport;
use App\Models\Primavera;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PrimaveraController extends Controller
{
    public function import()
    {
        $name = 'import/primavera/primavera.csv';

        Excel::import(new PrimaverasImport(), $name);

        return redirect('/')->with('success', 'All good!');
    }

    public function index()
    {
        $products = Primavera::paginate(15);
//        dd($products);
        return view('primavera.index', compact('products'));
    }

    public function show($id)
    {
        $product = Primavera::find($id);
//        dd($products);
        $imgs_2 = $product->img2;
        $imgs_2 = explode("\n", $imgs_2);

        $vendor_code = $product->vendor_code;
//        $path_dir = 'storage/Foto/' . $vendor_code;
//        $directories = Storage::directories('public/Foto');
        $files = Storage::disk('foto_primavera')->files('/'.$vendor_code);
//        dd($files);
        $fotossss = $files;
        $fotos = [];
        foreach ($fotossss as $f) {
            $fotos[] = Storage::disk('foto_primavera')->url($f);
        }

        return view('primavera.show', compact('product', 'imgs_2', 'fotos'));
    }

    public function search(Request $request)
    {
        $name = $request->input('name');
        $name = '%'.$name.'%';

        $products = Primavera::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);

        $products->appends(['name' => $name]);

        return view('primavera.index', compact('products'));
    }

    public function download_pic()
    {
//        set_time_limit(1000);
        $products = Primavera::all();

//        for ($i = 1; $i <= 3; $i++) {
//            $img_n = 'img_' . $i;
            foreach ($products as $product) {

                if ($product->img1 == '' || $product->img1 == null) {
                    continue;
                }

                $url = $product->img1;

                $file_extension = pathinfo($url)['extension'];
                // dd($file_extension);

                $file_name = $product->vendor_code.'_1.'.$file_extension;
                // dd($file_name);

                if (Storage::disk('primavera')->missing($file_name)) {

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_exec($ch);

                    $http_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
                    curl_close($ch);

                    // dd($http_code);
                    if ($http_code != 404) {
                        $file = file_get_contents($url);
                        Storage::disk('primavera')->put($file_name, $file);
                    }
                }
//            }
        }
    }
}
