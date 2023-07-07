<?php

namespace App\Http\Controllers;

use App\Models\AbsolutGres\AbsolutGresScrap;
use App\Models\Altacera\AltaceraTovar;
use App\Models\Altacera\AltaceraTovarAvailable;
use App\Models\LeedoProduct;
use App\Models\Primavera;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->input('name');
        $name = '%'.$name.'%';

        $products = Product::where('Name', 'LIKE', $name)->paginate(15);
        $products->appends(['name' => $name]);
//        dd(count($products));
        if (count($products)) {
            return view('product.index', [
                'products' => $products,
            ]);
        }

        $altacera = AltaceraTovarAvailable::where('tovar', 'LIKE', $name)->orWhere('artikul', 'LIKE', $name)->paginate(15);
        $altacera->appends(['name' => $name]);
        if (count($altacera)) {
            return view('altacera.index', [
                'products' => $altacera,
            ]);
        }

        $primavera = Primavera::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $primavera->appends(['name' => $name]);
        if (count($primavera)) {
            return view('primavera.index', [
                'products' => $primavera,
            ]);
        }

        $absolut_gres = AbsolutGresScrap::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $absolut_gres->appends(['name' => $name]);
        if (count($absolut_gres)) {
            return view('absolut_gres.index', [
                'products' => $absolut_gres,
            ]);
        }

        $leedo = LeedoProduct::where('Item_name', 'LIKE', $name)->paginate(15);
        $leedo->appends(['name' => $name]);
        if (count($leedo)) {
            return view('leedo.index', [
                'products' => $leedo,
            ]);
        }

        return redirect('/not-found-rezults');
    }
}
