<?php

namespace App\Http\Controllers;

use App\Imports\PrimaveraPriceListImport;
use App\Models\PrimaveraPriceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PrimaveraPriceListController extends Controller
{
    public function import_work_price_list(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/primavera-new/price-list/';

        Storage::putFileAs($name, $file,'primavera-price-list_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/primavera-new/price-list/primavera-price-list_'.$date.'.xlsx';
        PrimaveraPriceList::truncate();
        Excel::import(new PrimaveraPriceListImport(), $name_uploaded_file);

        return redirect()->route('primavera-new.index')->with('success', 'Primavera Price List обновлен!');
    }
}
