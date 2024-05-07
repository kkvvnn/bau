<?php

namespace App\Http\Controllers;

use App\Models\AbsolutGres\AbsolutGresScrap;
use App\Models\Altacera\AltaceraTovar;
use App\Models\Altacera\AltaceraTovarAvailable;
use App\Models\AquaFloor;
use App\Models\Artcenter;
use App\Models\LeedoProduct;
use App\Models\NTCeramic\NtCeramicNoImgs;
use App\Models\Pixmosaic;
use App\Models\PixmosaicNew;
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

        $ntceramic = NtCeramicNoImgs::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $ntceramic->appends(['name' => $name]);
        if (count($ntceramic)) {
            return view('ntceramic.index', [
                'products' => $ntceramic,
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

        $aquafloor = AquaFloor::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $aquafloor->appends(['name' => $name]);
        if (count($aquafloor)) {
            return view('aquafloor.index', [
                'products' => $aquafloor,
            ]);
        }

        $pixmosaic = PixmosaicNew::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $pixmosaic->appends(['name' => $name]);
        if (count($pixmosaic)) {
            return view('pixmosaic-new.index', [
                'products' => $pixmosaic,
            ]);
        }

        $rusplitka = \App\Models\Rusplitka\Product::where('name', 'LIKE', $name)->paginate(15);
        $rusplitka->appends(['name' => $name]);
        if (count($rusplitka)) {
            return view('rusplitka.index', [
                'products' => $rusplitka,
            ]);
        }

        $empero = \App\Models\Empero::where('title', 'LIKE', $name)->paginate(15);
        $empero->appends(['name' => $name]);
        if (count($empero)) {
            return view('empero.index', [
                'products' => $empero,
            ]);
        }

        $artcenter = Artcenter::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $artcenter->appends(['name' => $name]);
        if (count($artcenter)) {
            return view('artcenter.index', [
                'products' => $artcenter,
            ]);
        }

        return redirect('/not-found-rezults');
    }
}
