<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $path = $request->vendor;
//
        $path = Storage::disk('foto')->putFile($path, $request->file('foto'));
//        return redirect('/');
        return redirect()->route('show', ['id' => $request->id])->with('status', 'Фото загружено!');
    }
}
