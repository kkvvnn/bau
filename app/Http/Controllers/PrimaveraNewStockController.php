<?php

namespace App\Http\Controllers;

use App\Imports\PrimaveraNewStocksImport;
use App\Models\PrimaveraNewStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PrimaveraNewStockController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');
        $file2 = $request->file('file2');

        $date = date('Y-m-d_His');
        $name = 'import/primavera-new/stocks/';

        Storage::putFileAs($name, $file,'primavera-stocks_keramogranit'.$date.'.xls' );
        Storage::putFileAs($name, $file2,'primavera-stocks_plitka'.$date.'.xls' );

        $name_uploaded_file = 'import/primavera-new/stocks/primavera-stocks_keramogranit'.$date.'.xls';
        $name_uploaded_file2 = 'import/primavera-new/stocks/primavera-stocks_plitka'.$date.'.xls';
        PrimaveraNewStock::truncate();
        Excel::import(new PrimaveraNewStocksImport(), $name_uploaded_file);
        Excel::import(new PrimaveraNewStocksImport(), $name_uploaded_file2);

        $deleted = PrimaveraNewStock::where('vendor_code', 'regexp', '(^[^0-9]+[\/]?[^0-9]+$)')->delete();
        $deleted_whitespace = PrimaveraNewStock::where('vendor_code', 'regexp', '^\s*$')->delete();

        return redirect()->route('primavera-new.index')->with('success', 'Primavera остатки обновлены! ' . PrimaveraNewStock::count());
    }
}
