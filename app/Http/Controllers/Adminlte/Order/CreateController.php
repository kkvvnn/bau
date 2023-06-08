<?php

namespace App\Http\Controllers\Adminlte\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('adminlte.order.create');
    }
}
