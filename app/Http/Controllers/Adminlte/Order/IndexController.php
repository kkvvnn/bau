<?php

namespace App\Http\Controllers\Adminlte\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $orders = Order::all();
        return view('adminlte.order.index', compact('orders'));
    }
}
