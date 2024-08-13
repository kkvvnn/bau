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

        $date = date('Y-m-d_His');
        $name = 'import/primavera-new/stocks/';

        Storage::putFileAs($name, $file,'primavera-stocks_'.$date.'.xls' );

        $name_uploaded_file = 'import/primavera-new/stocks/primavera-stocks_'.$date.'.xls';
        PrimaveraNewStock::truncate();
        Excel::import(new PrimaveraNewStocksImport(), $name_uploaded_file);

        $deleted = PrimaveraNewStock::where('vendor_code', 'regexp', '(^[^0-9]+[\/]?[^0-9]+$)')->delete();
        $deleted_whitespace = PrimaveraNewStock::where('vendor_code', 'regexp', '^\s*$')->delete();

        return redirect()->route('primavera-new.index')->with('success', 'Primavera остатки обновлены!');
    }
}
