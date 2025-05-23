<?php

namespace App\Http\Controllers;

use App\Models\AbsolutGres\AbsolutGresScrap;
use App\Models\Altacera\AltaceraTovar;
use App\Models\ArtCentreNew;
use App\Models\Artkera\ArtkeraTovarAvailable;
use App\Models\AquaFloor;
use App\Models\Artcenter;
use App\Models\Azario;
use App\Models\GlobalTileNew;
use App\Models\Keramopro;
use App\Models\Kerranova;
use App\Models\LeedoProduct;
use App\Models\NewKevis;
use App\Models\NTCeramic\NtCeramicNoImgs;
use App\Models\Pixmosaic;
use App\Models\PixmosaicNew;
use App\Models\Primavera;
use App\Models\PrimaveraNew;
use App\Models\Product;
use App\Models\Skalla;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->input('name');
        $search_name = $name;
        $name = '%'.$name.'%';

        $products = Product::where('Name', 'LIKE', $name)->paginate(15);
        $products->appends(['name' => $name]);
//        dd(count($products));
        if (count($products)) {
            return view('product.index', [
                'products' => $products,
                'search_name' => $search_name,
            ]);
        }

        $altacera = ArtkeraTovarAvailable::where('tovar', 'LIKE', $name)
            ->orWhere('artikul', 'LIKE', $name)
            ->orWhere('title', 'LIKE', $name)
            ->paginate(15);
        $altacera->appends(['name' => $name]);
        if (count($altacera)) {
            return view('artkera.index', [
                'products' => $altacera,
                'search_name' => $search_name,
            ]);
        }

//        $primavera = Primavera::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
//        $primavera->appends(['name' => $name]);
//        if (count($primavera)) {
//            return view('primavera.index', [
//                'products' => $primavera,
//            ]);
//        }

        $ntceramic = NtCeramicNoImgs::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $ntceramic->appends(['name' => $name]);
        if (count($ntceramic)) {
            return view('ntceramic.index', [
                'products' => $ntceramic,
                'search_name' => $search_name,
            ]);
        }

        $absolut_gres = AbsolutGresScrap::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $absolut_gres->appends(['name' => $name]);
        if (count($absolut_gres)) {
            return view('absolut_gres.index', [
                'products' => $absolut_gres,
                'search_name' => $search_name,
            ]);
        }

        $leedo = LeedoProduct::where('Item_name', 'LIKE', $name)->paginate(15);
        $leedo->appends(['name' => $name]);
        if (count($leedo)) {
            return view('leedo.index2', [
                'products' => $leedo,
                'search_name' => $search_name,
            ]);
        }

        $aquafloor = AquaFloor::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $aquafloor->appends(['name' => $name]);
        if (count($aquafloor)) {
            return view('aquafloor.index', [
                'products' => $aquafloor,
                'search_name' => $search_name,
            ]);
        }

        $pixmosaic = PixmosaicNew::where('title', 'LIKE', $name)
            ->orWhere('vendor_code', 'LIKE', $name)
            ->paginate(15);
        $pixmosaic->appends(['name' => $name]);
        if (count($pixmosaic)) {
            return view('pixmosaic-new.index', [
                'products' => $pixmosaic,
                'search_name' => $search_name,
            ]);
        }

        $rusplitka = \App\Models\Rusplitka\Product::where('name', 'LIKE', $name)
            ->orWhere('articul', 'LIKE', $name)
            ->paginate(15);
        $rusplitka->appends(['name' => $name]);
        if (count($rusplitka)) {
            return view('rusplitka.index2', [
                'products' => $rusplitka,
                'search_name' => $search_name,
            ]);
        }
//
//        $empero = \App\Models\Empero::where('title', 'LIKE', $name)->paginate(15);
//        $empero->appends(['name' => $name]);
//        if (count($empero)) {
//            return view('empero.index', [
//                'products' => $empero,
//                'search_name' => $search_name,
//            ]);
//        }

        $kerranova = Kerranova::where('title', 'LIKE', $name)
            ->orWhere('vendor_code', 'LIKE', $name)
            ->orWhere('collection', 'LIKE', $name)
            ->paginate(15);
        $kerranova->appends(['name' => $name]);
        if (count($kerranova)) {
            return view('kerranova.index', [
                'products' => $kerranova,
                'search_name' => $search_name,
            ]);
        }

        $artcenter = ArtCentreNew::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $artcenter->appends(['name' => $name]);
        if (count($artcenter)) {
            return view('artcenter.index', [
                'products' => $artcenter,
                'search_name' => $search_name,
            ]);
        }

        $global_tile = GlobalTileNew::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $global_tile->appends(['name' => $name]);
        if (count($global_tile)) {
            return view('global-tile.index', [
                'products' => $global_tile,
                'search_name' => $search_name,
            ]);
        }

        $azario = Azario::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $azario->appends(['name' => $name]);
        if (count($azario)) {
            return view('azario.index', [
                'products' => $azario,
                'search_name' => $search_name,
            ]);
        }

        $primavera_new = PrimaveraNew::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $primavera_new->appends(['name' => $name]);
        if (count($primavera_new)) {
            return view('primavera-new.index', [
                'products' => $primavera_new,
                'search_name' => $search_name,
            ]);
        }

        $kevis = NewKevis::where('title', 'LIKE', $name)->orWhere('code', 'LIKE', $name)->paginate(15);
        $kevis->appends(['name' => $name]);
        if (count($kevis)) {
            return view('new-kevis.index', [
                'products' => $kevis,
                'search_name' => $search_name,
            ]);
        }

        $skalla = Skalla::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $skalla->appends(['name' => $name]);
        if (count($skalla)) {
            return view('skalla.index', [
                'products' => $skalla,
                'search_name' => $search_name,
            ]);
        }

        $keramopro = Keramopro::where('title', 'LIKE', $name)->orWhere('vendor_code', 'LIKE', $name)->paginate(15);
        $keramopro->appends(['name' => $name]);
        if (count($keramopro)) {
            return view('keramopro.index', [
                'products' => $keramopro,
                'search_name' => $search_name,
            ]);
        }


        return redirect('/not-found-rezults');
    }
}
