<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function down($id = 1)
    {
//        $products = Product::all();
        $product = Product::findOrFail($id);
        

        // $i = 1;
        // foreach ($products as $product) {

        //     echo $product->Picture;
        //     echo "<br>";
        // }

        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
        $name_file = Str::remove($string_for_delete, $product->Picture);

//        $name_file = 'c8b0ef73-19ed-11e3-a4c8-005056ad2cf4___0002.jpg';

        if (Storage::disk('public')->missing($name_file)) {
            $file = Storage::disk('ftp')->get($name_file);
            Storage::disk('public')->put($name_file, $file);
        }


        $url = Storage::url($name_file);

        return view('aaa', [
            'url' => $url,
            'product' => $product,
        ]);
    }

    public function index2($id = 1)
    {
        return $this->down($id);
    }
}
