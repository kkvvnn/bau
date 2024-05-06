<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\LeedoProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeedoController extends Controller
{
    public function import_from_ftp_to_database()
    {
        $date = date('Y-m-d_His');

        $file = Storage::disk('ftp_leedo')->get('Price.json');
        //      ---------------delete bom----------------------
        $bom = pack('H*', 'EFBBBF');
        $file = preg_replace("/^$bom/", '', $file);
        //      ------------end delete bom-----------------------
        if ($file != null) {
            $name = '/import/leedo/price_' . $date . '.json';
            Storage::disk('local')->put($name, $file);
        }

        Storage::copy($name, str_replace('leedo/', 'leedo/old/', $name));
        Storage::move($name, 'import/leedo/price.json');

        LeedoProduct::truncate();
        $json = Storage::disk('local')->get('import/leedo/price.json');
        $products = json_decode($json, true);
        foreach ($products as $product) {
            LeedoProduct::create($product);
        }

        return redirect()->route('leedo.index')->with('success', 'Таблица Leedo обновлена. Ok!');
    }

    public function index()
    {
        $products = LeedoProduct::paginate(15);

        return view('leedo.index2', compact('products'));
    }

    public function download_leedo_img()
    {
        set_time_limit(60);

        $products = LeedoProduct::all();

        $imgs = [];

        foreach ($products as $product) {
            if ($product->Basic_pic != null) {
                $imgs[] = $product->Basic_pic;
            }
            if ($product->Picture1 != null) {
                $imgs[] = $product->Picture1;
            }
            if ($product->Picture2 != null) {
                $imgs[] = $product->Picture2;
            }
            if ($product->Picture3 != null) {
                $imgs[] = $product->Picture3;
            }
            if ($product->Picture4 != null) {
                $imgs[] = $product->Picture4;
            }
            if ($product->Picture5 != null) {
                $imgs[] = $product->Picture5;
            }
            if ($product->Picture6 != null) {
                $imgs[] = $product->Picture6;
            }
            if ($product->Picture7 != null) {
                $imgs[] = $product->Picture7;
            }
        }
//        dd($imgs);

        foreach ($imgs as $img) {
            if (Storage::disk('leedo')->missing($img)) {

                $file = file_get_contents($img);
                if ($file != null) {
                    $str = substr($img, strrpos($img, '/') + 1);
                    Storage::disk('leedo')->put($str, $file);
                }
            }
        }
    }

    public function show($id)
    {
        $product = LeedoProduct::find($id);

        $images = [];

        if ($product->Basic_pic != null) {
            $images[] = $product->Basic_pic;
        }
        if ($product->Picture1 != null) {
            $images[] = $product->Picture1;
        }
        if ($product->Picture2 != null) {
            $images[] = $product->Picture2;
        }
        if ($product->Picture3 != null) {
            $images[] = $product->Picture3;
        }
        if ($product->Picture4 != null) {
            $images[] = $product->Picture4;
        }
        if ($product->Picture5 != null) {
            $images[] = $product->Picture5;
        }
        if ($product->Picture6 != null) {
            $images[] = $product->Picture6;
        }
        if ($product->Picture7 != null) {
            $images[] = $product->Picture7;
        }


        $text_color = '';
        $date_now = \Carbon\Carbon::now();
        $date_of_update = $product->updated_at;
        $diff_days = $date_now->diffInDays($date_of_update);

        if ($diff_days == 0) {
            $text_color = 'text-success';
        } elseif ($diff_days <= 7) {
            $text_color = 'text-warning';
        } else {
            $text_color = 'text-danger';
        }

        $vendor_code = $product->System_ID;
//        $path_dir = 'storage/Foto/' . $vendor_code;
//        $directories = Storage::directories('public/Foto');
        $files = Storage::disk('foto_leedo')->files('/' . $vendor_code);
//        dd($files);
        $fotossss = $files;
        $fotos = [];
        foreach ($fotossss as $f) {
            $fotos[] = Storage::disk('foto_leedo')->url($f);
        }

        return view('leedo.show2', [
            'product' => $product,
            'images' => $images,
            'fotos' => $fotos,
            'text_color' => $text_color,
        ]);
    }
}
