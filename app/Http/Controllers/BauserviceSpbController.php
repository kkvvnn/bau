<?php

namespace App\Http\Controllers;

use App\Models\BauserviceSpb;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BauserviceSpbController extends Controller
{
    public function index()
    {
        $products = BauserviceSpb::where([['GroupProduct', '01 Плитка'], ['balanceCount', '>=', 0]])->orderByRaw('Lenght * Height DESC')->paginate(15);

        return view('bauservice-spb.index', [
            'products' => $products,
        ]);
    }
}
