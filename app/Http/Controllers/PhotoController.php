<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $path = $request->vendor;
//        $image = $request->file('foto')->store($path, 'foto');
        $extension = $request->file('foto')->getClientOriginalExtension();

        $date = date("Y-m-d_His");

        $image = $request->file('foto')->storeAs($path, $path. '_'. $date .'.'.$extension, 'foto');
        return redirect('/');
    }
}
