<?php

namespace App\Http\Controllers;

use App\Imports\PixmosaicNewImport;
use App\Models\PixmosaicNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PixmosaicNewController extends Controller
{
    public function import_work(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/pixmosaic-new/';

        Storage::putFileAs($name, $file,'pixmosaic_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/pixmosaic-new/pixmosaic_'.$date.'.xlsx';
        PixmosaicNew::truncate();
        Excel::import(new PixmosaicNewImport(), $name_uploaded_file);

        return redirect()->route('pixmosaic-new.index')->with('success', 'Pixmosaic обновлено!');
//        return redirect('/')->with('success', 'Pixmosaic обновлено!');
    }

    public function index()
    {
        $products = PixmosaicNew::paginate(15);
        return view('pixmosaic-new.index', compact('products'));
    }

    public function show($id)
    {
        $product = PixmosaicNew::find($id);

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

        $img = [];
        $img[] = $product->img;

        return view('pixmosaic-new.show', compact('product', 'text_color', 'img'));
    }
}
