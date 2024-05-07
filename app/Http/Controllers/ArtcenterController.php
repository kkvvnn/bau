<?php

namespace App\Http\Controllers;

use App\Imports\ArtcenterImport;
use App\Models\Artcenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ArtcenterController extends Controller
{
    public function import()
    {
        Artcenter::truncate();
        $url = 'https://rdp.tpv.one/files/msk2474/Msk2474%20(XLSX).xlsx';
        $contents = file_get_contents($url);

        $date = date('Y-m-d_His');
        $name = 'import/artcenter/original/artcenter_'.$date.'.xlsx';

        Storage::put($name, $contents);

        $name = base_path() . '/storage/app/' . $name;

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($name);

        $spreadsheet->getActiveSheet()->removeRow(1, 2);
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save(base_path() . '/storage/app/import/artcenter/artcenter_'.$date.'.xlsx');

        $name = 'import/artcenter/artcenter_'.$date.'.xlsx';

        Excel::import(new ArtcenterImport(), $name);
        return redirect('/')->with('success', 'All good!');
    }

    public function index()
    {
        $products = Artcenter::where([['brand', 'Art Ceramic'],
            ['moscow_stock', '>=', 2],
            ['image1', '!=', ''],
            ['vendor_code', '!=', 'Spenze Gris 60x120'],
            ])
            ->paginate(15);

//        dd($products);

        return view('artcenter.index', compact('products'));
    }

    public function show($id)
    {
        $product = Artcenter::find($id);

        $string_for_delete = 'https://media.artcentre.club/';
        $images = [];
        if ($product->image1 != '') {
            $images[] = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image1));
        }
        if ($product->image2 != '') {
            $images[] = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image2));
        }
        if ($product->image3 != '') {
            $images[] = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image3));
        }
        if ($product->image4 != '') {
            $images[] = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image4));
        }

        $text_color = '';
        $date_now = \Carbon\Carbon::now();
        $date_of_update = $product->updated_at;
        $diff_days = $date_now->diffInDays($date_of_update);

        if ($diff_days == 0) {
            $text_color = 'text-success';
        } elseif ($diff_days <= 7) {
            $text_color = 'text-warning';
        } else {
            $text_color = 'text-danger';
        }

        return view('artcenter.show', compact('product', 'images', 'text_color'));
    }

    public function collection($name)
    {
        $products = Artcenter::where([['collection', 'LIKE', $name],
//            ['moscow_stock', '>=', 2],
//            ['image1', '!=', ''],
//            ['vendor_code', '!=', 'Spenze Gris 60x120'],
        ])
            ->paginate(15);

//        dd($products);

        return view('artcenter.index', compact('products'));
    }
}
