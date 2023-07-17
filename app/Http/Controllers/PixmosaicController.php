<?php

namespace App\Http\Controllers;

use App\Imports\PixmosaicsImport;
use App\Imports\PrimaverasImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PixmosaicController extends Controller
{
    public function import()
    {
        $name = 'import/pixmosaic/pix_all.xlsx';

        Excel::import(new PixmosaicsImport(), $name);

        return redirect('/')->with('success', 'All good!');
    }
}
