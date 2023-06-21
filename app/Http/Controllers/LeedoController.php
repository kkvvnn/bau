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


    }

    public function index()
    {
        $json = Storage::disk('local')->get('import/leedo/price.json');
        $time_of_import_unix = Storage::lastModified('import/leedo/price.json');
        $time_of_import = Carbon::createFromTimestamp($time_of_import_unix)->format('Y-m-d');

        $products = json_decode($json, true);

        return view('leedo.index', compact('products', 'time_of_import'));
    }
}
