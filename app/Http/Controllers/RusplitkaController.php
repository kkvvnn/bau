<?php

namespace App\Http\Controllers;

use App\Models\Rusplitka\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RusplitkaController extends Controller
{
    public function index()
    {
        $products = Product::where('price_rozn', '!=', 0)
            ->where('rest_real_free', '>', 0)
//            ->orderBy('size_a')
            ->orderByRaw('size_a * size_b DESC')
            ->paginate(15);
        return view('rusplitka.index2', compact('products'));
    }

    public function names()
    {
        $products = Product::where('price_rozn', '!=', 0)
            ->orderBy('size_a')
            ->get();
        return view('rusplitka.index3', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::whereSlug($slug)->firstOrFail();
        $imgs = [];
        foreach ($product->picture as $img) {
            $imgs[] = Storage::disk('rusplitka')->url(Str::remove('https://www.rusplitka.ru/upload/iblock/', $img));
        }

        $collection = $product->collection;
        $img_collection = [];
        foreach ($collection->picture as $img) {
            $img_collection[] = Storage::disk('rusplitka')->url(Str::remove('https://www.rusplitka.ru/upload/iblock/', $img));
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

        $bronnicy_stock = (float)$product->rest_skald_bronnicy - (float)$product->rest_skald_bronnicy_rezerv;
        $ljubercy_stock = (float)$product->rest_skald_ljubercy - (float)$product->rest_skald_ljubercy_rezerv;
        $sklad_20t_stock = (float)$product->rest_skald_20t - (float)$product->rest_skald_20t_rezerv;
        $krasnodar_stock = (float)$product->rest_skald_krasnodar - (float)$product->rest_skald_krasnodar_rezerv;

        return view('rusplitka.show2', [
            'product' => $product,
            'imgs' => $imgs,
            'img_collection' => $img_collection,
            'text_color' => $text_color,
            'bronnicy_stock' => $bronnicy_stock,
            'ljubercy_stock' => $ljubercy_stock,
            'sklad_20t_stock' => $sklad_20t_stock,
            'krasnodar_stock' => $krasnodar_stock,
        ]);
    }

    public function collection($name)
    {
        $products = Product::whereHas('collection', function ($query) use ($name) {
            $query->where('name', 'LIKE', '%'.$name.'%');
        })->paginate(15);

        return view('rusplitka.index2', compact('products'));
    }
}
