<?php

namespace App\Http\Controllers;

use App\Exports\AvitoSpbExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AvitoSpbController extends Controller
{
    public function export(Request $request, $foto = '')
    {
        set_time_limit(90);
        $phone = $request->phone??"79523666692";
        $name = $request->name??"Илья";
        $contact_method = $request->contact_method??"В сообщениях";
        $address = $request->address??"Санкт-Петербург, 2 линия, метро Парнас";
        $add_description = $request->add_description??"";
        $add_description_first = $request->add_description_first??"";
        // return Excel::download(new AvitoExport, date("Y-m-d_His").'.xlsx');
        $filename = 'avito-spb/'.$foto.'SPB'.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoSpbExport($foto, $phone, $name, $contact_method, $address, $add_description, $add_description_first), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $rodion = false;
        $spb = true;
        return view('exports.url', compact('url', 'rodion', 'spb'));
    }
}
