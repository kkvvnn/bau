<?php

namespace App\Http\Controllers;

use App\Exports\AvitoExport;
use App\Exports\AvitoTwoExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AvitoTwoController extends Controller
{
    public function export(Request $request, $foto = '')
    {
        set_time_limit(90);
        $phone = $request->phone??"79151274000";
        $name = $request->name??"Родион";
        $contact_method = $request->contact_method??"По телефону и в сообщениях";
        $address = $request->address??"Москва, Арбатско-Покровская линия ";
        $add_description = $request->add_description??"";
        $add_description_first = $request->add_description_first??"";
        // return Excel::download(new AvitoExport, date("Y-m-d_His").'.xlsx');
        $filename = 'avito-rodion/'.$foto.'Rodion_'.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoTwoExport($foto, $phone, $name, $contact_method, $address, $add_description, $add_description_first), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $rodion = true;
        return view('exports.url', compact('url', 'rodion'));
    }
}
