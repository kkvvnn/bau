<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\LeedoProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeedoController extends Controller
{
    public function import_ftp_to_json()
    {
        $date = date('Y-m-d_His');

        $file = Storage::disk('ftp_leedo')->get('Price.json');
        //      ---------------delete bom----------------------
        $bom = pack('H*', 'EFBBBF');
        $file = preg_replace("/^$bom/", '', $file);
        //      ------------end delete bom-----------------------
        if ($file != null) {
            $name = '/import/leedo/price_'. $date .'.json';
            Storage::disk('local')->put($name, $file);
        }

        Storage::copy($name, str_replace('leedo/', 'leedo/old/', $name));
        Storage::move($name, 'import/leedo/price.json');

        return redirect('/')->with('success', 'Таблица Leedo обновлена. Ok!');
    }

    public function index()
    {
        $json = Storage::disk('local')->get('import/leedo/price.json');
        $time_of_import_unix = Storage::lastModified('import/leedo/price.json');
        $time_of_import = Carbon::createFromTimestamp($time_of_import_unix)->format('Y-m-d');

        $products = json_decode($json, true);

        return view('leedo.index', compact('products', 'time_of_import'));
    }

    public function download_leedo_img()
    {
        set_time_limit(360);

        $json = Storage::disk('local')->get('import/leedo/price.json');
        $products = json_decode($json, true);

//        dd($products);

        $imgs = [];

        foreach ($products as $product) {
            if(isset($product['Basic_pic'])) {
                $imgs[] = $product['Basic_pic'];
            }if(isset($product['Picture1'])) {
                $imgs[] = $product['Picture1'];
            }if(isset($product['Picture2'])) {
                $imgs[] = $product['Picture2'];
            }if(isset($product['Picture3'])) {
                $imgs[] = $product['Picture3'];
            }if(isset($product['Picture4'])) {
                $imgs[] = $product['Picture4'];
            }if(isset($product['Picture5'])) {
                $imgs[] = $product['Picture5'];
            }if(isset($product['Picture6'])) {
                $imgs[] = $product['Picture6'];
            }if(isset($product['Picture7'])) {
                $imgs[] = $product['Picture7'];
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
}
