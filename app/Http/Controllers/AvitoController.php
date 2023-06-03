<?php

namespace App\Http\Controllers;

use App\Exports\AvitoExport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

// use Illuminate\Http\Request;

class AvitoController extends Controller
{
    public function export($foto = '')
    {
        set_time_limit(90);
        // return Excel::download(new AvitoExport, date("Y-m-d_His").'.xlsx');
        $filename = 'avito/'.$foto.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoExport($foto), $filename, 'public');

        return config('app.url').Storage::url($filename);
    }
}
