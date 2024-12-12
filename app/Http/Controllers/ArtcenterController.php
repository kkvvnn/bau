<?php

namespace App\Http\Controllers;

use App\Models\ArtCentreNew;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtcenterController extends Controller
{
    public function artcenter($brand)
    {
        $brand = str_replace('-', ' ', $brand);

        $products = ArtCentreNew::where('brand', $brand)
            ->where('vendor_code', '!=', 'Spenze Gris 60x120')
            ->where(column: function (Builder $query) {
                $stock = 1;
                $query->orWhere('moscow', '>', $stock);
                $query->orWhere('kazan', '>', $stock);
                $query->orWhere('nn', '>', $stock);
                $query->orWhere('samara', '>', $stock);
                $query->orWhere('spb', '>', $stock);
            })
            ->whereJsonLength('images', '>', 0)
            ->orderByRaw('width * length DESC')
            ->orderByDesc('moscow')
            ->orderByDesc('kazan')
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

    public function collection($name, $brand)
    {
        $products = ArtCentreNew::where([
            ['collection', 'LIKE', '%'.$name.'%'],
            ['brand', 'LIKE', '%'.$brand.'%'],
        ])
            ->paginate(15);

        return view('artcenter.index', compact('products'));
    }
}
