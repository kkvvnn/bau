<?php

namespace App\Http\Controllers;

use App\Models\Rusplitka\Product;
use Illuminate\Http\Request;

class NordaController extends Controller
{
    public function index()
    {
        $count_per_page = 30;
        $products = \App\Models\Product::where([['GroupProduct', '01 Плитка'], ['Producer_Brand', 'Laparet'], ['balanceCount', '>=', 0]])->orderByRaw('Lenght * Height DESC')->paginate($count_per_page);

        $count_products = \App\Models\Product::where([['GroupProduct', '01 Плитка'], ['Producer_Brand', 'Laparet'], ['balanceCount', '>=', 0]])->count();

        return view('norda-wide', [
            'products' => $products,
            'count_per_page' => $count_per_page,
            'count_products' => $count_products,
        ]);
    }
}
