<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $path = $request->vendor;
//        dd($path);
//        $image = $request->file('foto')->store($path, 'foto');
//        $extension = $request->file('foto')->extension();

//        $date = date("Y-m-d_His");

        $image = $request->file('foto')->store($path, 'foto');
        return redirect('/');
    }
}
