<?php

namespace App\Http\Controllers;

use App\Exports\WoocommerceExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class WoocommerceController extends Controller
{
    public function export()
    {
        $filename = 'woocommerce/woocommerce'.date('Y-m-d_His').'.csv';

        Excel::store(new WoocommerceExport(), $filename, 'woocommerce', \Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
        ]);

        $url = Storage::disk('woocommerce')->url($filename);
        return view('exports.url-woocommerce', compact('url'));
    }
}
