<?php

namespace App\Http\Controllers;

use App\Imports\AquaFloorImport;
use Illuminate\Http\Request;
use App\Models\AquaFloor;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AquaFloorController extends Controller
{
    public function import()
    {
        // $name = Storage::get('aquafloor/import/aquafloor_all.xlsx');
        $name = 'import/aquafloor/aquafloor.xlsx';

        Excel::import(new AquaFloorImport, $name);

        return redirect('/')->with('success', 'All good!');
    }
}
