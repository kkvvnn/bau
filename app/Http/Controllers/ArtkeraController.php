<?php

namespace App\Http\Controllers;

use App\Models\Artkera\ArtkeraTerritory;
use App\Models\Artkera\ArtkeraTovar;
use App\Models\Artkera\ArtkeraTovarAvailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtkeraController extends Controller
{
    public function index()
    {
        $products = ArtkeraTovarAvailable::orderByRaw('width * height DESC')
            ->paginate(15);

        return view('artkera.index', [
            'products' => $products,
        ]);
    }

    public function index_millennium()
    {
        $products = ArtkeraTovarAvailable::orderByRaw('width * height DESC')
            ->paginate(15);

        return view('artkera.index-millennium', [
            'products' => $products,
        ]);
    }

    public function show($slug)
    {
        $product = ArtkeraTovarAvailable::whereSlug($slug)->firstOrFail();

//        dd($product->images->images);

        $images = [];
        foreach ($product->images->images as $img) {
            $images[] = Storage::disk('artkera')->url($img);
        }

        $images_collection = [];
        foreach ($product->images_collection->images as $img) {
            $images_collection[] = Storage::disk('artkera')->url($img);
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

        return view('artkera.show', [
            'product' => $product,
            'images' =>$images,
            'images_collection' =>$images_collection,
            'text_color' => $text_color,
        ]);
    }

    public function collection($name)
    {
        $products = ArtkeraTovarAvailable::where('category', 'LIKE', '%'.$name.'%')
            ->paginate(15);

        return view('artkera.index', compact('products'));
    }
}
