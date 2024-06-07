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
        $phone = $request->phone??"89197697802";
        $name = $request->name??"Владимир";
        $contact_method = $request->contact_method??"В сообщениях";
        $address = $request->address??"Москва, Филёвская линия, метро Фили";
        $add_description = $request->add_description??"";
        $add_description_first = $request->add_description_first??"";

        $sales = [
            'laparet' => 100,
            'cersanit' => 100,
            'vitra' => 100,
            'ceradim' => 100,
            'primavera' => 100,
            'leedo' => 90,
            'altacera' => 100,
            'ntceramic' => 100,
            'kevis' => 100,
            'rusplitka' => 100,
            'aquafloor' => 100,
            'pixmosaic' => 90,
            'artcenter' => 100,
        ];

        // return Excel::download(new AvitoExport, date("Y-m-d_His").'.xlsx');
        $filename = 'avito/'.$foto.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoExport($foto, $phone, $name, $contact_method, $address, $add_description, $add_description_first, $sales), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $rodion = false;
        $spb = false;
        return view('exports.url', compact('url', 'rodion', 'spb'));
    }
}
