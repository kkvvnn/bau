<?php

namespace App\Http\Controllers;

use App\Imports\AvitoTwoExcelImport;
use App\Models\AvitoTwoExcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AvitoTwoExcelController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/avito-2-old/';

        Storage::putFileAs($name, $file,'avito-2-old_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/avito-2-old/avito-2-old_'.$date.'.xlsx';
        AvitoTwoExcel::truncate();
        Excel::import(new AvitoTwoExcelImport(), $name_uploaded_file);

        return redirect()->route('product_index')->with('success', 'Avito 2 old обновлено!');
    }
}
