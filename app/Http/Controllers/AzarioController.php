<?php

namespace App\Http\Controllers;

use App\Imports\AzarioImport;
use App\Imports\AzarioPriceStockImport;
use App\Models\Azario;
use App\Models\AzarioPriceStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AzarioController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/azario/';

        Storage::putFileAs($name, $file,'azario_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/azario/azario_'.$date.'.xlsx';
        Azario::truncate();
        Excel::import(new AzarioImport(), $name_uploaded_file);

        return redirect()->route('azario.index')->with('success', 'Azario контент залит!');
    }

    public function import_price_stock(Request $request)
    {
        set_time_limit(500);

        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/azario/price-stock/';

        Storage::putFileAs($name, $file,'azario-price-stock_'.$date.'.csv' );

        $name_uploaded_file = 'import/azario/price-stock/azario-price-stock_'.$date.'.csv';
        AzarioPriceStock::truncate();
        Excel::import(new AzarioPriceStockImport(), $name_uploaded_file);

        return redirect()->route('azario.index')->with('success', 'Azario Price List и Stocks обновлены!');
    }

    public function index()
    {
        $products = Azario::whereHas('props', function ($query) {
            $query->where('price', '!=', 0);
        })
            ->orderByRaw('length * width DESC')
            ->paginate(15);


        return view('azario.index', compact('products'));
    }
}
