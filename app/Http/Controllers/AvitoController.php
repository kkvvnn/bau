<?php

namespace App\Http\Controllers;

use App\Exports\AvitoExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Http\Request;

class AvitoController extends Controller
{
    public function export()
    {
        // return Excel::download(new AvitoExport, date("Y-m-d_His").'.xlsx');
        $filename = 'avito/' . date("Y-m-d_His") . '.xlsx';
        Excel::store(new AvitoExport, $filename, 'public');

        return Storage::url($filename);
    }
}
