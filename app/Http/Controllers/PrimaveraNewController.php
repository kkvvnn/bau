<?php

namespace App\Http\Controllers;

use App\Imports\PrimaveraNewImport;
use App\Models\PrimaveraNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PrimaveraNewController extends Controller
{
    public function import_work(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/primavera-new/';

        Storage::putFileAs($name, $file,'primavera-new_'.$date.'.xls' );

        $name_uploaded_file = 'import/primavera-new/primavera-new_'.$date.'.xls';
        PrimaveraNew::truncate();
        Excel::import(new PrimaveraNewImport(), $name_uploaded_file);

        return redirect()->route('primavera-new.index')->with('success', 'Primavera контент залит!');
    }
}
