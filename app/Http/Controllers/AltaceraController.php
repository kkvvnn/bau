<?php

namespace App\Http\Controllers;

use App\Models\Altacera\AltaceraBalance;
use App\Models\Altacera\AltaceraTovar;
use App\Models\Altacera\AltaceraTovarAvailable;
use Illuminate\Http\Request;

class AltaceraController extends Controller
{
    public function index()
    {
        $products = AltaceraTovarAvailable::paginate(15);


        return view('altacera.index', [
            'products' => $products,
        ]);

    }
}
