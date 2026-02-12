<?php

namespace App\Http\Controllers;

use App\Imports\GlobalTileImport;
use App\Imports\GlobalTilePriceStockImport;
use App\Models\GlobalTile;
use App\Models\GlobalTileNew;
use App\Models\GlobalTilePriceStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class GlobalTileController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/global-tile/';

        Storage::putFileAs($name, $file,'global-tile_'.$date.'.xls' );

        $name_uploaded_file = 'import/global-tile/global-tile_'.$date.'.xls';
        GlobalTileNew::truncate();
        Excel::import(new GlobalTileImport(), $name_uploaded_file);

        return redirect()->route('global-tile.index')->with('success', 'Global Tile обновлено!');
    }

    public function import_price_stock(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/global-tile/';

        Storage::putFileAs($name, $file,'global-tile-price-stock_'.$date .'.'. $file->extension() );

        $name_uploaded_file = 'import/global-tile/global-tile-price-stock_'.$date .'.'. $file->extension();
        GlobalTilePriceStock::truncate();
        Excel::import(new GlobalTilePriceStockImport(), $name_uploaded_file);

        return redirect()->route('global-tile.index')->with('success', 'Global Tile Price Stock обновлено обновлено!');
    }

    public function index()
    {
        $products = GlobalTileNew::has('adds')
            ->where([
//            ['brand', 'GlobalTile'],
            ['Picture', '!=', ''],
        ])
            ->orderByRaw('length * width DESC')
            ->paginate(15);
//        ->get();

//        dd($products);
//
//        $products = GlobalTileNew::where([
//            ['brand', 'GlobalTile'],
//            ['Picture', '!=', null],
//            ['balance', '>=', 0],
//        ])
//            ->orderByRaw('length * width DESC')
//            ->paginate(15);

        return view('global-tile.index', compact('products'));
    }

    public function show($slug)
    {
        $product = GlobalTileNew::has('adds')->whereSlug($slug)->firstOrFail();

        $string_for_delete = 'https://gallery.vogtrade.ru/wp-content/uploads/images/';
        $img = Storage::disk('global-tile')->url(Str::remove($string_for_delete, $product->Picture));

//        -----------------------------
        $urls_c = [];
        if ($product->image_collection != '') {
            $urls_c[] = Storage::disk('global-tile')->url(Str::remove($string_for_delete, $product->image_collection));
        } else {
            $urls_c[] = Storage::disk('no_image')->url('no_image.jpg');
        }
//        -----------------------------------

        $name_files = [];
        for ($pic = 1; $pic <= 24; $pic++) {
            if ($pic == 1) {
                $name = 'Picture';
            } else {
                $name = 'Picture'.$pic;
            }
            if ($product->$name != null) {
                $name_files[$name] = Str::remove($string_for_delete, $product->$name);
            }
        }

        $urls_2 = [];
        foreach ($name_files as $key => $value) {
            $urls_2[] = Storage::disk('global-tile')->url($value);
        }
//        ------------------------------------

        $text_color = '';
        $date_now = \Carbon\Carbon::now();
        $date_of_update = $product->adds->updated_at;
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
        return view('global-tile.show', [
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
        $products = GlobalTileNew::has('adds')->where('collection', 'LIKE', '%'.$name.'%')
            ->paginate(15);

        return view('global-tile.index', compact('products'));
    }
}
