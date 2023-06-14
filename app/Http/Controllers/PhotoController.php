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

    public function store_primavera(Request $request)
    {
        $path = $request->vendor;
//
        $path = Storage::disk('foto_primavera')->putFile($path, $request->file('foto'));
//        return redirect('/');
        return redirect()->route('primavera.show', ['id' => $request->id])->with('status', 'Фото загружено!');
    }

    public function store_absolut_gres(Request $request)
    {
        $path = $request->vendor;
//
        $path = Storage::disk('foto_absolut_gres')->putFile($path, $request->file('foto'));
//        return redirect('/');
        return redirect()->route('absolut_gres.show', ['id' => $request->id])->with('status', 'Фото загружено!');
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

    public function delete_primavera(Request $request)
    {
//        dd($request->foto_delete);
        $path = $request->foto_delete;
        $path = str_replace('/storage/foto-primavera', '', $path);
//        dd($path);

        Storage::disk('foto_primavera')->delete($path);

        return redirect()->route('primavera.show', ['id' => $request->id])->with('status_delete', 'Фото удалено!');
    }

    public function delete_absolut_gres(Request $request)
    {
//        dd($request->foto_delete);
        $path = $request->foto_delete;
        $path = str_replace('/storage/foto-absolut-gres', '', $path);
//        dd($path);

        Storage::disk('foto_absolut_gres')->delete($path);

        return redirect()->route('absolut_gres.show', ['id' => $request->id])->with('status_delete', 'Фото удалено!');
    }
}
