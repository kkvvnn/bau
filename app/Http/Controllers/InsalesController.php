<?php

namespace App\Http\Controllers;

use App\Exports\InsalesExport;
use App\Exports\WoocommerceExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class InsalesController extends Controller
{
    public function export()
    {
        $filename = 'insales/insales'.date('Y-m-d_His').'.xlsx';

//        Excel::store(new InsalesExport(), $filename, 'woocommerce', \Maatwebsite\Excel\Excel::CSV, [
//            'Content-Type' => 'text/csv',
//        ]);

        Excel::store(new InsalesExport(), $filename, 'woocommerce');

        $url = Storage::disk('woocommerce')->url($filename);
        return view('exports.url-woocommerce', compact('url'));
    }
}
