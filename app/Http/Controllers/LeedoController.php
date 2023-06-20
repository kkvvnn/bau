<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeedoController extends Controller
{
    public function import_ftp_json()
    {
        $date = date('Y-m-d_His');

        $file = Storage::disk('ftp_leedo')->get('Price.json');
        if ($file != null) {
            $name = '/import/leedo/price_'. $date .'.json';
            Storage::disk('local')->put($name, $file);
        }

        $json = Storage::disk('local')->get($name);

//        ---------------delete bom----------------------
        $bom = pack('H*', 'EFBBBF');
        $json = preg_replace("/^$bom/", '', $json);
//        ------------end delete bom-----------------------

        $json = json_decode($json, true);

        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                echo 'Ошибок нет';
                break;
            case JSON_ERROR_DEPTH:
                echo 'Достигнута максимальная глубина стека';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                echo 'Некорректные разряды или несоответствие режимов';
                break;
            case JSON_ERROR_CTRL_CHAR:
                echo 'Некорректный управляющий символ';
                break;
            case JSON_ERROR_SYNTAX:
                echo 'Синтаксическая ошибка, некорректный JSON';
                break;
            case JSON_ERROR_UTF8:
                echo 'Некорректные символы UTF-8, возможно неверно закодирован';
                break;
            default:
                echo 'Неизвестная ошибка';
                break;
        }

        dd($json);
    }
}
