<?php

namespace App\Http\Controllers;

use App\Imports\SkallaImport;
use App\Models\Skalla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class SkallaController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/skalla/';

        Storage::putFileAs($name, $file,'skalla_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/skalla/skalla_'.$date.'.xlsx';
        Skalla::truncate();
        Excel::import(new SkallaImport(), $name_uploaded_file);

        return redirect()->route('skalla.index')->with('success', 'Skalla контент залит!');
    }

    public function index()
    {
        $products = Skalla::paginate(15);

        return view('skalla.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Skalla::whereSlug($slug)->firstOrFail();

        $string_for_delete = 'https://static.tildacdn.com/';
        $img = Storage::disk('skalla')->url(Str::remove($string_for_delete, $product->images[0]));

//        -----------------------------
        $urls_c = [];
        if ($product->images != '') {
            $urls_c[] = Storage::disk('skalla')->url(Str::remove($string_for_delete, $product->images[0]));
        } else {
            $urls_c[] = Storage::disk('no_image')->url('no_image.jpg');
        }
//        -----------------------------------

        $urls_2 = [];
        foreach ($product->images as $key => $value) {
            $urls_2[] = Storage::disk('skalla')->url(Str::remove($string_for_delete, $value));
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
        return view('skalla.show', [
            'product' => $product,
            'urls' => $urls_2,
            // 'url2' => $url2,
//            'collection' => $collection,
            'url_collection' => $urls_c,
            'vivod' => $vivod,
            'text_color' => $text_color,
        ]);
    }

    public function collection($slug)
    {
//        $products = Skalla::where('collection', 'LIKE', '%'.$name.'%')
//            ->paginate(15);

        $products = Skalla::whereSlugCollection($slug)
            ->paginate(15);

        return view('skalla.index', compact('products'));
    }
}
