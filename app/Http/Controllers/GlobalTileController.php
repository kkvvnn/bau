<?php

namespace App\Http\Controllers;

use App\Imports\GlobalTileImport;
use App\Models\GlobalTile;
use App\Models\GlobalTileNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class GlobalTileController extends Controller
{
    public function import_work(Request $request)
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

    public function index()
    {
        $products = GlobalTile::where([
            ['brand', 'GlobalTile'],
        ])
            ->orderByRaw('length * width DESC')
            ->paginate(15);

//        dd($products);

        return view('global-tile.index', compact('products'));
    }

    public function show($id)
    {
        $product = GlobalTile::find($id);

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

        return view('pixmosaic-new.show', compact('product', 'text_color'));
    }
}
