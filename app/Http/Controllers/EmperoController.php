<?php

namespace App\Http\Controllers;

use App\Imports\EmperoImport;
use App\Models\Empero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class EmperoController extends Controller
{
    public function import_work(Request $request)
    {
//        $name = 'import/empero/empero.xlsx';

        $file = $request->file('file');
//        dd($file);

        $date = date('Y-m-d_His');
        $name = 'import/empero/';

        Storage::putFileAs($name, $file,'empero_'.$date.'.xlsx' );

        $name_uploaded_file = 'import/empero/empero_'.$date.'.xlsx';
        Empero::truncate();
        Excel::import(new EmperoImport(), $name_uploaded_file);

        return redirect()->route('empero.index')->with('success', 'Empero обновлено!');
    }

    public function index()
    {
        $products = Empero::where('title', 'not like', '% 2 %')->orderBy('length')->paginate(15);
//        dd($products);
        return view('empero.index', compact('products'));
    }

    public function show($id)
    {
        $product = Empero::find($id);

        $img = [];
        foreach ($product->images as $i) {
            $img[] = Storage::disk('empero')->url(mb_substr($i['images-href'], mb_strpos($i['images-href'], 'src=') + 4));
        }

        $img_collection = [];
        foreach ($product->img_collection as $i_c) {
            $img_collection[] = Storage::disk('empero')->url(mb_substr($i_c['img_collection-src'], mb_strpos($i_c['img_collection-src'], 'src=') + 4));
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

        return view('empero.show', compact('product', 'img', 'img_collection', 'text_color'));
    }
}
