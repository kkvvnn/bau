<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');
        $path = $request->path;
        $name = $request->name;

//        dd($path);


//        return redirect()->route('skalla.index')->with('success', 'Skalla контент залит!');


        return $file->storeAs(
            $path, $name.'.'.$file->extension(), 'media'
        );
    }
}
