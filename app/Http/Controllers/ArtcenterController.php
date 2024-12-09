<?php

namespace App\Http\Controllers;

use App\Imports\ArtcenterImport;
use App\Models\Artcenter;
use App\Models\ArtCentreNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ArtcenterController extends Controller
{
    public function index_artcenter()
    {
        $products = ArtCentreNew::where([
            ['brand', 'Art Ceramic'],
//            ['moscow_stock', '>', 0],
            ['vendor_code', '!=', 'Spenze Gris 60x120'],
            ])
            ->paginate(15);

//        dd($products);

        return view('artcenter.index', compact('products'));
    }

    public function show($slug)
    {
        $product = ArtCentreNew::whereSlug($slug)->firstOrFail();

        $string_for_delete = 'https://media.artcentre.club/';
        $images = [];

        foreach ($product->images as $img) {
            $images[] = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $img));
        }

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

        return view('artcenter.show', compact('product', 'images', 'text_color'));
    }

    public function collection($name)
    {
        $products = ArtCentreNew::where([
            ['collection', 'LIKE', '%'.$name.'%'],
        ])
            ->paginate(15);

        return view('artcenter.index', compact('products'));
    }
}
