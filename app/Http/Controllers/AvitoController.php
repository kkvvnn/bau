<?php

namespace App\Http\Controllers;

use App\Exports\AvitoExport;
use Maatwebsite\Excel\Facades\Excel;

// use Illuminate\Http\Request;

class AvitoController extends Controller
{
    public function export() 
{
    return Excel::download(new AvitoExport, date("Y-m-d_His").'.xlsx');
}

}
