<?php

namespace App\Http\Controllers;

use App\Imports\KerranovaImport;
use App\Imports\KerranovaPriceStockImport;
use App\Models\Kerranova;
use App\Models\KerranovaPriceStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;


class KerranovaController extends Controller
{
    public function import_work(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/kerranova/';

        Storage::putFileAs($name, $file,'kerranova_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/kerranova/kerranova_'.$date.'.xlsx';
        Kerranova::truncate();
        Excel::import(new KerranovaImport(), $name_uploaded_file);

        return redirect()->route('kerranova.index')->with('success', 'Kerranova контент залит!');
    }

    public function import_work_price_stock(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/kerranova/price-stock/';

        Storage::putFileAs($name, $file,'kerranova-price-stock_'.$date.'.xls' );

        $name_uploaded_file = 'import/kerranova/price-stock/kerranova-price-stock_'.$date.'.xls';
        KerranovaPriceStock::truncate();
        Excel::import(new KerranovaPriceStockImport(), $name_uploaded_file);

        return redirect()->route('kerranova.index')->with('success', 'Kerranova Price List и Stocks обновлены!');
    }

    public function index()
    {
        $products = Kerranova::whereHas('props')
        ->orderByRaw('length * width DESC')
        ->paginate(15);

        return view('kerranova.index', compact('products'));
    }

    public function show($id)
    {
        $product = Kerranova::find($id);

        $string_for_delete = 'https://lk.kerranova.ru/storage/images/products/';
        $img = Storage::disk('kerranova')->url(Str::remove($string_for_delete, $product->images[0]));

//        -----------------------------
        $urls_c = [];
        if ($product->images != '') {
            $urls_c[] = Storage::disk('kerranova')->url(Str::remove($string_for_delete, $product->images[0]));
        } else {
            $urls_c[] = Storage::disk('no_image')->url('no_image.jpg');
        }
//        -----------------------------------

        $urls_2 = [];
        foreach ($product->images as $key => $value) {
            $urls_2[] = Storage::disk('kerranova')->url(Str::remove($string_for_delete, $value));
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
        return view('kerranova.show', [
            'product' => $product,
            'urls' => $urls_2,
            // 'url2' => $url2,
//            'collection' => $collection,
            'url_collection' => $urls_c,
            'vivod' => $vivod,
            'text_color' => $text_color,
        ]);
    }

    public function collection($name)
    {
        $products = Kerranova::where('collection', 'LIKE', '%'.$name.'%')
            ->paginate(15);

        return view('kerranova.index', compact('products'));
    }
}
