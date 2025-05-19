<?php

namespace App\Http\Controllers;

use App\Imports\AzarioImport;
use App\Imports\AzarioPriceStockImport;
use App\Models\Azario;
use App\Models\AzarioPriceStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
            ->orderByDesc('length')
            ->orderByDesc('width')
            ->paginate(15);


        return view('azario.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Azario::whereSlug($slug)->firstOrFail();

        $string_for_delete = 'https://www.santehcentr.com';
        $img = Storage::disk('azario')->url(Str::remove($string_for_delete, $product->images[0]));

//        -----------------------------
        $urls_c = [];
        if ($product->images != '') {
            $urls_c[] = Storage::disk('azario')->url(Str::remove($string_for_delete, $product->images[0]));
        } else {
            $urls_c[] = Storage::disk('no_image')->url('no_image.jpg');
        }
//        -----------------------------------

        $urls_2 = [];
        foreach ($product->images as $key => $value) {
            $urls_2[] = Storage::disk('azario')->url(Str::remove($string_for_delete, $value));
        }
//        ------------------------------------

        $text_color = '';
        $date_now = \Carbon\Carbon::now();
        $date_of_update = $product->props->updated_at;
        $diff_days = $date_now->diffInDays($date_of_update);

        if ($diff_days == 0) {
            $text_color = 'text-success';
        } elseif ($diff_days <= 7) {
            $text_color = 'text-warning';
        } else {
            $text_color = 'text-danger';
        }

        $vivod = '';

//        return view('pixmosaic-new.show', compact('product', 'text_color', 'urls_c'));
        return view('azario.show', [
            'product' => $product,
            'urls' => $urls_2,
            // 'url2' => $url2,
//            'collection' => $collection,
            'url_collection' => $urls_c,
            'vivod' => $vivod,
            'text_color' => $text_color,
        ]);
    }
}
