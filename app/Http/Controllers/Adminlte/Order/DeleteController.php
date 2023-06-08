<?php

namespace App\Http\Controllers\Adminlte\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index');
    }
}
