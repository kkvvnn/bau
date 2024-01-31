<?php

namespace App\Http\Controllers;

use App\Imports\PixmosaicVideoImport;
use App\Models\PixmosaicVideo;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PixmosaicVideoController extends Controller
{
    public function import()
    {
        $name = 'import/pixmosaic-video/pix_video.xlsx';

        PixmosaicVideo::truncate();
        Excel::import(new PixmosaicVideoImport(), $name);

        return redirect('/')->with('success', 'All good!');
    }
}
