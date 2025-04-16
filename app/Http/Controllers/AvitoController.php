<?php

namespace App\Http\Controllers;

use App\Exports\AvitoExport;
use App\Exports\AvitoKazanExport;
use App\Exports\AvitoLaparetMoscowExport;
use App\Exports\AvitoMillenniumExport;
use App\Imports\AvitoTwoExcelImport;
use App\Models\AvitoTwoExcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
        set_time_limit(300);
        $data = $request->except(['_token']);

        $filename = 'avito/main/MAIN-'.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoExport($data), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $type = 'main';
        return view('exports.avito.url', compact('url', 'type'));
    }

    /**
     * @throws Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export_laparet_moscow(Request $request): View
    {
        $data = $request->except(['_token']);

        $filename = 'avito/laparet-moscow/MOSCOW-'.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoLaparetMoscowExport($data), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $type = 'laparet-moscow';
        return view('exports.avito.url', compact('url', 'type'));
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
        return view('exports.avito.url', compact('url', 'type'));
    }

    /**
     * @throws Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export_millennium(Request $request): View
    {
        $data = $request->except(['_token']);

        $filename = 'avito/millennium/MILLENNIUM-'.date('Y-m-d_His').'.xlsx';
        Excel::store(new AvitoMillenniumExport($data), $filename, 'avito');

        $url = Storage::disk('avito')->url($filename);
        $type = 'millennium';
        return view('exports.avito.url', compact('url', 'type'));
    }

    public function import_old_ads(Request $request)
    {
        $file = $request->file('file');

        $date = date('Y-m-d_His');
        $name = 'import/avito-2-old/';

        Storage::putFileAs($name, $file,'avito-2-old_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/avito-2-old/avito-2-old_'.$date.'.xlsx';
        AvitoTwoExcel::truncate();
        Excel::import(new AvitoTwoExcelImport(), $name_uploaded_file);

        return redirect()->route('product_index')->with('success', 'Avito 2 old обновлено!');
    }

    public function form(string $account): View
    {
        switch ($account) {
            case 'main':
                $data['color'] = 'text-bg-secondary';
                $data['title'] = 'Автозагрузка Авито Напольные Решения';
                $data['phone'] = '89197697802';
                $data['manager_name'] = 'Владимир';
//                $data['address'] = 'Москва, Филёвская линия, метро Фили';
                $data['address'] = 'Московская область, Одинцовский городской округ, рабочий посёлок Новоивановское, Западная улица, с100';
                $data['communication'] = [
                    'phone_and_message' => 'selected',
                    'only_message' => '',
                    'only_phone' => '',
                ];
                break;
            case 'laparet-moscow':
                $data['color'] = 'text-bg-warning';
                $data['title'] = 'Автозагрузка Авито Laparet-Запад';
                $data['phone'] = '89151274000';
                $data['manager_name'] = 'Родион';
                $data['address'] = 'Москва, Арбатско-Покровская линия, метро Славянский бульвар';
                $data['communication'] = [
                    'phone_and_message' => 'selected',
                    'only_message' => '',
                    'only_phone' => '',
                ];
                break;
            case 'laparet-kazan':
                $data['color'] = 'text-bg-info';
                $data['title'] = 'Автозагрузка Авито КАЗАНЬ';
                $data['phone'] = '89150072659';
                $data['manager_name'] = 'Маргарита';
                $data['address'] = 'Республика Татарстан (Татарстан), Казань, улица Габдуллы Тукая, 57';
                $data['communication'] = [
                    'phone_and_message' => 'selected',
                    'only_message' => '',
                    'only_phone' => '',
                ];
                break;
            case 'millennium':
                $data['color'] = 'text-bg-success';
                $data['title'] = 'Автозагрузка Авито Миллениум';
                $data['phone'] = '89164900555';
                $data['manager_name'] = 'Наиль';
                $data['address'] = 'Республика Татарстан (Татарстан), Казань, улица Журналистов, 102Г';
                $data['communication'] = [
                    'phone_and_message' => 'selected',
                    'only_message' => '',
                    'only_phone' => '',
                ];
                break;
            default:
                abort(404);
        }

        return view('exports.avito.form', [
            'data' => $data,
        ]);
    }
}
