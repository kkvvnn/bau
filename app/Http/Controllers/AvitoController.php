<?php

namespace App\Http\Controllers;

use App\Exports\AvitoExport;
use App\Exports\AvitoKazanExport;
use App\Exports\AvitoLaparetExport;
use App\Exports\AvitoSpbExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Exception;

class AvitoController extends Controller
{
    /**
     * @throws Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export_main(Request $request): View
    {
        $data = $request->except(['_token']);

        $filename = 'avito/main/MAIN-'.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoExport($data), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $type = 'main';
        return view('exports.url', compact('url', 'type'));
    }

    /**
     * @throws Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export_laparet_moscow(Request $request): View
    {
        $data = $request->except(['_token']);

        $filename = 'avito/laparet-moscow/MOSCOW-'.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoLaparetExport($data), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $type = 'laparet-moscow';
        return view('exports.url', compact('url', 'type'));
    }

    /**
     * @throws Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export_laparet_kazan(Request $request): View
    {
        $data = $request->except(['_token']);

        $filename = 'avito/laparet-kazan/KAZAN-'.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoKazanExport($data), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $type = 'laparet-kazan';
        return view('exports.url', compact('url', 'type'));
    }

    /**
     * @throws Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export_laparet_spb(Request $request): View
    {
        $data = $request->except(['_token']);

        $filename = 'avito/laparet-spb/SPB-'.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoSpbExport($data), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $type = 'laparet-spb';
        return view('exports.url', compact('url', 'type'));
    }
}
