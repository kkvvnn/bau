<?php

namespace App\Http\Controllers\Aqua;

use App\Http\Controllers\Controller;
use App\Imports\AquaImport;
use App\Imports\AquaPriceListImport;
use App\Imports\AquaStockImport;
use App\Models\Aqua\Aqua;
use App\Models\Aqua\AquaCollection;
use App\Models\Aqua\AquaStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class AquaController extends Controller
{
    public function import_price_list(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/aquafloor/price-list/';

        Storage::putFileAs($name, $file,'aquafloor-price-list_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/aquafloor/price-list/aquafloor-price-list_'.$date.'.xlsx';
        AquaCollection::truncate();
        Excel::import(new AquaPriceListImport(), $name_uploaded_file);

        return redirect()->route('aquafloor.index-collections')->with('success', 'Aquafloor Price List обновлен!');
    }

    public function import_stocks(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/aquafloor/stocks/';

        Storage::putFileAs($name, $file,'aquafloor-stocks_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/aquafloor/stocks/aquafloor-stocks_'.$date.'.xlsx';
        AquaStock::truncate();
        Excel::import(new AquaStockImport(), $name_uploaded_file);

        return redirect()->route('aquafloor.index')->with('success', 'Aquafloor остатки обновлены!');
    }

    public function index_collections()
    {
        return 'OK COLLECTIONS';
    }

    public function import(Request $request)
    {
        set_time_limit(240);

        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/aquafloor/decors/';

        Storage::putFileAs($name, $file,'aquafloor-decors_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/aquafloor/decors/aquafloor-decors_'.$date.'.xlsx';
        Aqua::truncate();
        Excel::import(new AquaImport(), $name_uploaded_file);

//        Artisan::call('aqua:download-images');

        return redirect()->route('aquafloor.index')->with('success', 'Aquafloor Content (DECORS) обновлен! Выполните aqua:download-images');
    }

    public function index()
    {
        $products = Aqua::whereHas('stock')
            ->orderBy('price')
            ->paginate(15);

//        $products = Aqua::whereDoesntHave('stock')->get();
//
//        dd($products);


        return view('aqua.index', [
            'products' => $products,
        ]);
    }

    public function show($slug)
    {
        $product = Aqua::whereSlug($slug)->firstOrFail();

        $string_for_delete = '';
        $img = Storage::disk('aquafloor')->url($product->image);

//        -----------------------------
        $urls_c = [];
        if ($product->collection_relation->image != '') {
            $urls_c[] = $product->collection_relation->image;
        } else {
            $urls_c[] = Storage::disk('no_image')->url('no_image.jpg');
        }
//        -----------------------------------


        $urls_2 = [];
        $urls_2[] = $img;
//        ------------------------------------

        $text_color = '';
        $date_now = \Carbon\Carbon::now();
        $date_of_update = $product->stock->updated_at;
        $diff_days = $date_now->diffInDays($date_of_update);

        if ($diff_days == 0) {
            $text_color = 'text-success';
        } elseif ($diff_days <= 7) {
            $text_color = 'text-warning';
        } else {
            $text_color = 'text-danger';
        }

        $vivod = '';

        $text = $product->collection;
        $char = "/";

        $parts = explode($char, $text, 2);

        $collection = trim($parts[1]);

        return view('aqua.show', [
            'product' => $product,
            'urls' => $urls_2,
            'url_collection' => $urls_c,
            'vivod' => $vivod,
            'text_color' => $text_color,
            'collection' => $collection,
        ]);
    }

    public function collection($name)
    {
        $products = Aqua::whereHas('stock')
            ->where('collection', 'LIKE', '%'.$name.'%')
            ->paginate(15);

        return view('aqua.index', compact('products'));
    }
}
