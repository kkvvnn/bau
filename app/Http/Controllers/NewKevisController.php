<?php

namespace App\Http\Controllers;

use App\Models\NewKevis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NewKevisImport;

class NewKevisController extends Controller
{
    public function import()
    {
        $name = 'import/new-kevis/kevis.xlsx';

        Excel::import(new NewKevisImport(), $name);

        return redirect()->route('kevis.index')->with('success', 'Kevis import. Good!');
    }

    public function index()
    {
        $products = NewKevis::paginate(15);

//        dd($products);

        return view('new-kevis.index', compact('products'));
    }

    public function show($slug)
    {
        $product = NewKevis::whereSlug($slug)->firstOrFail();

        $images = array(Storage::disk('kevis')->url($product->images));
        $video = Storage::disk('kevis')->url($product->videos);

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

        return view('new-kevis.show', [
            'product' => $product,
            'images' => $images,
            'videos' => $video,
            'vivod' => $vivod,
            'text_color' => $text_color,
        ]);
    }

    public function collection($name)
    {
        $products = NewKevis::where('collection', 'LIKE', '%'.$name.'%')
            ->paginate(15);

        return view('new-kevis.index', compact('products'));
    }
}
