<?php

namespace App\Http\Controllers;

use App\Exports\AvitoExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

// use Illuminate\Http\Request;

class AvitoController extends Controller
{
    public function export(Request $request, $foto = '')
    {
        set_time_limit(90);
        $phone = $request->phone??"79039890822";
        $contact_method = $request->contact_method??"В сообщениях";
        $address = $request->address??"Москва, парк Победы";
        // return Excel::download(new AvitoExport, date("Y-m-d_His").'.xlsx');
        $filename = 'avito/'.$foto.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoExport($foto, $phone, $contact_method, $address), $filename, 'public');

        $url = config('app.url').Storage::url($filename);
        return view('exports.url', compact('url'));
    }
}
