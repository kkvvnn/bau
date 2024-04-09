<?php

namespace App\Http\Controllers;

use App\Models\BauserviceNn;
use Illuminate\Http\Request;

class BauserviceNnController extends Controller
{
    public function index()
    {
        $products = BauserviceNn::where([['GroupProduct', '01 Плитка'], ['balanceCount', '>', 0]])->orderByRaw('Lenght * Height DESC')->paginate(15);

//        dd($products);

        return view('bauservice-spb.index', [
            'products' => $products,
        ]);
    }
}
