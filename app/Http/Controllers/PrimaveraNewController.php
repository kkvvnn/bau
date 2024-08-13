<?php

namespace App\Http\Controllers;

use App\Imports\PrimaveraNewImport;
use App\Models\PrimaveraNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class PrimaveraNewController extends Controller
{
    public function import_work(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/primavera-new/';

        Storage::putFileAs($name, $file,'primavera-new_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/primavera-new/primavera-new_'.$date.'.xlsx';
        PrimaveraNew::truncate();
        Excel::import(new PrimaveraNewImport(), $name_uploaded_file);

        return redirect()->route('primavera-new.index')->with('success', 'Primavera контент залит!');
    }

    public function index()
    {
        $products = PrimaveraNew::where([
        ])
            ->orderByRaw('length * width DESC')
            ->paginate(15);


        return view('primavera-new.index', compact('products'));
    }

    public function show($id)
    {
        $product = PrimaveraNew::find($id);

        $string_for_delete = 'https://domix-club.ru/upload/iblock/';
        $img = Storage::disk('primavera-new')->url(Str::remove($string_for_delete, $product->Picture));

//        -----------------------------
        $urls_c = [];
        if ($product->image_collection != '') {
            $urls_c[] = Storage::disk('primavera-new')->url(Str::remove($string_for_delete, $product->image_collection));
        } else {
            $urls_c[] = Storage::disk('no_image')->url('no_image.jpg');
        }
//        -----------------------------------

//        $name_files = [];
//        for ($pic = 1; $pic <= 24; $pic++) {
//            if ($pic == 1) {
//                $name = 'Picture';
//            } else {
//                $name = 'Picture'.$pic;
//            }
//            if ($product->$name != null) {
//                $name_files[$name] = Str::remove($string_for_delete, $product->$name);
//            }
//        }

        $urls_2 = [];
        foreach ($product->images as $key => $value) {
            $urls_2[] = Storage::disk('primavera-new')->url(Str::remove($string_for_delete, $value));
        }
//        ------------------------------------

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

        $vivod = '';

//        return view('pixmosaic-new.show', compact('product', 'text_color', 'urls_c'));
        return view('primavera-new.show', [
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
        $products = PrimaveraNew::where('collection', 'LIKE', '%'.$name.'%')
            ->paginate(15);

        return view('primavera-new.index', compact('products'));
    }
}
