<?php

namespace App\Http\Controllers;

use App\Models\Altacera\AltaceraBalance;
use App\Models\Altacera\AltaceraTovar;
use App\Models\Altacera\AltaceraTovarAvailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AltaceraController2 extends Controller
{
    public function index()
    {
        $products = AltaceraTovarAvailable::paginate(15);

        return view('altacera.index', [
            'products' => $products,
        ]);

    }

    public function show($slug)
    {
        $product = AltaceraTovarAvailable::whereSlug($slug)->firstOrFail();

        if (isset($product->picture->images)) {
            $images = $product->picture->images;
        } else {
            $images = Storage::disk('altacera')->url($product->tovar_id . '.JPEG');
            $images = explode(' | ', $images);
        }

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

        return view('altacera.show2', [
            'product' => $product,
            'images' =>$images,
            'text_color' => $text_color,
        ]);
    }

    public function collection($name)
    {
        $products = AltaceraTovarAvailable::where('category', 'LIKE', '%'.$name.'%')
            ->paginate(15);

        return view('altacera.index', compact('products'));
    }
}
