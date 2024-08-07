<?php

namespace App\Http\Controllers;

use App\Imports\Kerabellezza2Import;
use App\Imports\KerabellezzaImport;
use App\Models\Kerabellezza;
use App\Models\Kerabellezza2;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KerabellezzaController extends Controller
{
    public function import()
    {
        $name = 'import/kerabellezza/kerabellezza.xlsx';

        Kerabellezza::truncate();
        Excel::import(new KerabellezzaImport(), $name);

        return redirect('/')->with('success', 'All good!');
    }

    public function import2()
    {
        $name = 'import/kerabellezza/kerabellezza2.xlsx';

        Kerabellezza2::truncate();
        Excel::import(new Kerabellezza2Import(), $name);

        return redirect('/')->with('success', 'All good!');
    }

    public function index()
    {
        $products = Kerabellezza2::where([
            ['type', '!=', 'product'],
            ['image', '!=', ''],
            ])
            ->paginate(15);

        return view('kerabellezza.index', compact('products'));
    }

    public function show($id)
    {
        $product = Kerabellezza2::find($id);

        $images = $product->image;
        $images = explode(' | ', $images);

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

        return view('kerabellezza.show', compact('product', 'images', 'text_color'));
    }
}
