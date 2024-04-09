<?php

namespace App\Http\Controllers;

use App\Models\BauserviceKzn;
use Illuminate\Http\Request;

class BauserviceKznController extends Controller
{
    public function index()
    {
        $products = BauserviceKzn::where([['GroupProduct', '01 Плитка'], ['balanceCount', '>=', 0]])->orderByRaw('Lenght * Height DESC')->paginate(15);

//        dd($products);

        return view('bauservice-spb.index', [
            'products' => $products,
        ]);
    }
}
