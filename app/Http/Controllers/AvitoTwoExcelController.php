<?php

namespace App\Http\Controllers;

use App\Imports\AvitoTwoExcelImport;
use App\Models\AvitoTwoExcel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AvitoTwoExcelController extends Controller
{
    public function import()
    {
        $name = 'import/avito-excel/avito2-olds.xlsx';

        AvitoTwoExcel::truncate();
        Excel::import(new AvitoTwoExcelImport(), $name);

        return redirect('/')->with('success', 'All good!');
    }
}
