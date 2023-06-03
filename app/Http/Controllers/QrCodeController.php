<?php

namespace App\Http\Controllers;

use App\Models\Product;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function show()
    {
        // return QrCode::size(200)
        //     ->generate(
        //         'Hello, World!',
        //     );
        $products = Product::where('balanceCount', '>', 2)->orderByDesc('Height')->paginate(15);

        return view('qr_code.qr_code', [
            'products' => $products,
        ]);
    }

    public function scan()
    {

        return view('qr_code.scan_qr');
    }
}
