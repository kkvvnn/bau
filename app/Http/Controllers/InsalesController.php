<?php

namespace App\Http\Controllers;

use App\Exports\InsalesExport;
use App\Exports\WoocommerceExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class InsalesController extends Controller
{
    public function export_laparet_carving()
    {
        $filename = 'insales/insales_laparet_carving_'.date('Y-m-d_His').'.xlsx';

        Excel::store(new InsalesExport('laparet-carving', 'Каталог ## Каталог/Керамогранит Carving'), $filename, 'woocommerce');

        $url = Storage::disk('woocommerce')->url($filename);
        return view('exports.url-woocommerce', compact('url'));
    }

    public function export_laparet_wood()
    {
        $filename = 'insales/insales_laparet_wood_'.date('Y-m-d_His').'.xlsx';

        Excel::store(new InsalesExport('laparet-wood', 'Каталог ## Каталог/Керамогранит под дерево'), $filename, 'woocommerce');

        $url = Storage::disk('woocommerce')->url($filename);
        return view('exports.url-woocommerce', compact('url'));
    }
}
