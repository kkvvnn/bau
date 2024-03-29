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
        $name = $request->name??"Владимир";
        $contact_method = $request->contact_method??"В сообщениях";
        $address = $request->address??"Москва, Филёвская линия, метро Фили";
        $add_description = $request->add_description??"";
        $add_description_first = $request->add_description_first??"";
        // return Excel::download(new AvitoExport, date("Y-m-d_His").'.xlsx');
        $filename = 'avito/'.$foto.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoExport($foto, $phone, $name, $contact_method, $address, $add_description, $add_description_first), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $rodion = false;
        $spb = false;
        return view('exports.url', compact('url', 'rodion', 'spb'));
    }
}
