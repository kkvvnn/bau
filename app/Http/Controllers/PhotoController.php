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

    public function delete(Request $request)
    {
//        dd($request->foto_delete);
        $path = $request->foto_delete;
        $path = str_replace('/storage/foto', '', $path);
//        dd($path);

        Storage::disk('foto')->delete($path);

        return redirect()->route('show', ['id' => $request->id])->with('status_delete', 'Фото удалено!');
    }
}
