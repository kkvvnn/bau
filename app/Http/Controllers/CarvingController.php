<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CarvingController extends Controller
{
    public function index()
    {
        $name = '%'.'арвинг'.'%';
        $products = Product::where('Surface', 'LIKE', $name)->paginate(15);

//        dd($products);

        return view('product.index', compact('products'));
    }
}
