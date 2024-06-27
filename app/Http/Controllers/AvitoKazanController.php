<?php

namespace App\Http\Controllers;

use App\Exports\AvitoKazanExport;
use App\Exports\AvitoSpbExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AvitoKazanController extends Controller
{
    public function export(Request $request, $foto = '')
    {
        set_time_limit(90);
        $phone = $request->phone??"79164900555";
        $name = $request->name??"Родион";
        $contact_method = $request->contact_method??"В сообщениях";
        $address = $request->address??"Республика Татарстан, Казань, улица Габдуллы Тукая, 57";
        $add_description = $request->add_description??"";
        $add_description_first = $request->add_description_first??"";
        // return Excel::download(new AvitoExport, date("Y-m-d_His").'.xlsx');
        $filename = 'avito-kazan/'.$foto.'KAZAN_'.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoKazanExport($foto, $phone, $name, $contact_method, $address, $add_description, $add_description_first), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $rodion = false;
        $spb = true;
        return view('exports.url', compact('url', 'rodion', 'spb'));
    }
}
