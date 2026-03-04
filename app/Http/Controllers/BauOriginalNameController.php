<?php

namespace App\Http\Controllers;

use App\Imports\BauOriginalNamesImport;
use App\Models\BauOriginalName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BauOriginalNameController extends Controller
{
    public function import(Request $request)
    {
        set_time_limit(1000);

        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/bau-names/';

        Storage::putFileAs($name, $file,'bau-names_'.$date.'.csv' );

        $name_uploaded_file = 'import/bau-names/bau-names_'.$date.'.csv';
        BauOriginalName::truncate();
        Excel::import(new BauOriginalNamesImport(), $name_uploaded_file);

        return redirect()->route('laparet.index')->with('success', 'Успешно!!');
    }
}
