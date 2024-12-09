<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\LeedoProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LeedoController extends Controller
{
    public function import_from_ftp_to_database()
    {
        $date = date('Y-m-d_His');

        $file = Storage::disk('ftp_leedo')->get('Price.json');
        //      ---------------delete bom----------------------
        $bom = pack('H*', 'EFBBBF');
        $file = preg_replace("/^$bom/", '', $file);
        //      ------------end delete bom-----------------------
        if ($file != null) {
            $name = '/import/leedo/price_' . $date . '.json';
            Storage::disk('local')->put($name, $file);
        }

        Storage::copy($name, str_replace('leedo/', 'leedo/old/', $name));
        Storage::move($name, 'import/leedo/price.json');

        LeedoProduct::truncate();
        $json = Storage::disk('local')->get('import/leedo/price.json');
        $products = json_decode($json, true);
        foreach ($products as $product) {
            LeedoProduct::create($product);
        }

        return redirect()->route('leedo.index')->with('success', 'Таблица Leedo обновлена. Ok!');
    }

    public function index()
    {
        $products = LeedoProduct::where([
            ['Category', 'like', 'Мозаика%'],
            ['Sklad_Msk_LeeDo', '>=', 0],
        ])

            ->paginate(15);

        return view('leedo.index2', compact('products'));
    }

    public function show($slug)
    {
        $product = LeedoProduct::whereSlug($slug)->firstOrFail();

        $images = [];

        if ($product->Basic_pic != null) {
            $images[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Basic_pic));
        }
        if ($product->Picture1 != null) {
            $images[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture1));
        }
        if ($product->Picture2 != null) {
            $images[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture2));
        }
        if ($product->Picture3 != null) {
            $images[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture3));
        }
        if ($product->Picture4 != null) {
            $images[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture4));
        }
        if ($product->Picture5 != null) {
            $images[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture5));
        }
        if ($product->Picture6 != null) {
            $images[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture6));
        }
        if ($product->Picture7 != null) {
            $images[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture7));
        }


        $date_now = \Carbon\Carbon::now();
        $date_of_update = $product->updated_at;
        $diff_days = $date_now->diffInDays($date_of_update);

        if ($diff_days == 0) {
            $text_color = 'text-success';
        } elseif ($diff_days <= 7) {
            $text_color = 'text-warning';
        } else {
            $text_color = 'text-danger';
        }

        return view('leedo.show2', [
            'product' => $product,
            'images' => $images,
            'text_color' => $text_color,
        ]);
    }

    public function collection($name)
    {
        $products = LeedoProduct::where('Item_name', 'LIKE', $name.'%')
            ->paginate(15);

        return view('leedo.index2', compact('products'));
    }
}
