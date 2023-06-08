<?php

namespace App\Http\Controllers\Adminlte\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('adminlte.main.index');
    }
}
