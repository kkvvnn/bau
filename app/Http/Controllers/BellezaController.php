<?php

namespace App\Http\Controllers;

use App\Exports\BellezaFileExport;
use App\Models\Belleza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class BellezaController extends Controller
{
    public function index()
    {
        $products = Belleza::where('price', '!=', 0)
            ->where('stock', '>', 0)
            ->orderByRaw('length * width DESC')
            ->orderBy('price')
            ->paginate(15);

        return view('belleza.index2', compact('products'));
    }

    public function show($slug)
    {
        $product = Belleza::whereSlug($slug)->firstOrFail();
        $imgs = $product->images;

//        foreach ($product->picture as $img) {
//            $imgs[] = Storage::disk('rusplitka')->url(Str::remove('https://www.rusplitka.ru/upload/iblock/', $img));
//        }

        $collection = $product->collection;
        $img_collection = [];
        $img_collection[] = str_replace('https://mkplitka.ru/https://mkplitka.ru/', 'https://mkplitka.ru/', $product->image_collection);
//        foreach ($collection->picture as $img) {
//            $img_collection[] = Storage::disk('rusplitka')->url(Str::remove('https://www.rusplitka.ru/upload/iblock/', $img));
//        }

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


        return view('belleza.show2', [
            'product' => $product,
            'imgs' => $imgs,
            'img_collection' => $img_collection,
            'text_color' => $text_color,
        ]);
    }

    public function collection($name)
    {
        $products = Belleza::where('collection', 'LIKE', $name.'%')
            ->paginate(15);

        return view('belleza.index2', compact('products'));
    }

    public function export()
    {
        $filename = 'belleza/belleza_file_'.date('Y-m-d_His').'.xlsx';

        Excel::store(new BellezaFileExport(), $filename, 'woocommerce');

        $url = Storage::disk('woocommerce')->url($filename);
        return view('exports.url-woocommerce', compact('url'));
    }
}
