<?php

namespace App\Http\Controllers\Aqua;

use App\Http\Controllers\Controller;
use App\Imports\AquaImport;
use App\Imports\AquaPriceListImport;
use App\Models\Aqua\Aqua;
use App\Models\Aqua\AquaCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
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

        Artisan::call('aqua:download-images');

        return redirect()->route('aquafloor.index')->with('success', 'Aquafloor Content (DECORS) обновлен! Выполните aqua:download-images');
    }

    public function index()
    {
        $products = Aqua::orderBy('price')
            ->paginate(15);


        return view('aqua.index', [
            'products' => $products,
        ]);
    }
}
