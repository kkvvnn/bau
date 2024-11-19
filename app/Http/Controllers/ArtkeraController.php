<?php

namespace App\Http\Controllers;

use App\Models\Artkera\ArtkeraTerritory;
use App\Models\Artkera\ArtkeraTovar;
use App\Models\Artkera\ArtkeraTovarAvailable;
use Illuminate\Http\Request;

class ArtkeraController extends Controller
{
    public function index()
    {
        $kazan_depots = ArtkeraTerritory::wherePriceList('Казань')->first()->depots;
        $moscow_depots = ArtkeraTerritory::wherePriceList('Москва')->first()->depots;

        $all_depots = $kazan_depots->merge($moscow_depots);

//        dd($all_depots);

        $depots_arr = [];
        foreach ($all_depots as $dp) {
            $depots_arr[$dp['depot']] = $dp['depot_id'];
        }

//        dd($depots_arr);

        $products = ArtkeraTovarAvailable::orderByDesc('width')
            ->orderByDesc('height')
            ->paginate(15);


        return view('altacera.index-test', [
            'products' => $products,
            'depots' => $depots_arr,
        ]);
    }

    public function index_new()
    {
        set_time_limit(2000);
        $products = ArtkeraTovar::all()
            ->groupBy('artikul');

//        dd($products);

        $arr = [];
        foreach ($products as $key => $values) {
            $temp_arr = [];
            foreach ($values as $value) {

                $tovar = ArtkeraTovar::whereTovarId($value['tovar_id'])->whereCategoryId($value['category_id'])->first();
                foreach ($tovar->balance as $balance) {
                    if ($balance->balance || $balance->reserve || $balance->free_balance || $balance->balance_way) {
                        $temp_arr[] = [$value['tovar_id'] => $value['category_id']];
                    }
                }

                if (count($temp_arr)) {
                    $arr[$key] = $temp_arr;
                }
            }

        }

        dd($arr);

        return view('artkera.index', [
            'products' => $products,
        ]);
    }
    public function index_test()
    {
        $products = ArtkeraTovar::all()
            ->groupBy('artikul');
//        dd($products['DW7BFN25']);
//        dd($products['e07941a1-288e-11ea-80db-00155d5d5700']);
//        dd($products);


        echo '<style>
   table {
    width: 100%; /* Ширина таблицы */
    border-collapse: collapse;
   }
   td, th {
    border: 2px solid #009542; /* Параметры рамки */
   }
  </style>';

        echo '<table>';

        echo '<tr>';

        echo '<th>';
        echo 'category';
        echo '</th>';

        echo '<th>';
        echo 'tovar';
        echo '</th>';

        echo '<th>';
        echo 'category_id';
        echo '</th>';

        echo '<th>';
        echo 'tovar_id';
        echo '</th>';

        echo '<th>';
        echo 'artikul';
        echo '</th>';
//
//                echo '<th>';
//                echo 'artikul_diy'];//                echo '</th>';

        echo '<th>';
        echo 'deleted';
        echo '</th>';

        echo '<th>';
        echo 'archive';
        echo '</th>';

        echo '<th>';
        echo 'action';
        echo '</th>';

        echo '<th>';
        echo 'status';
        echo '</th>';

        echo '<th>';
        echo 'not_unload';
        echo '</th>';

        echo '<th>';
        echo 'not_unload_site';
        echo '</th>';

        echo '<th>';
        echo 'collection_item';
        echo '</th>';

        echo '<th>';
        echo 'number_of_patterns';
        echo '</th>';

        echo '<th>';
        echo 'country';
        echo '</th>';

        echo '<th>';
        echo 'surface_type';
        echo '</th>';

        echo '<th>';
        echo 'height';
        echo '</th>';

        echo '<th>';
        echo 'width';
        echo '</th>';

        echo '<th>';
        echo 'thickness';
        echo '</th>';

        echo '<th>';
        echo 'name_for_site';
        echo '</th>';

        echo '<th>';
        echo 'Рельеф';
        echo '</th>';

        echo '<th>';
        echo 'Ректификация';
        echo '</th>';

        echo '<th>';
        echo 'Износостойкость';
        echo '</th>';

        echo '<th>';
        echo 'is_Delacora_Big_Format';
        echo '</th>';

        echo '<th>';
        echo 'sale';
        echo '</th>';

        echo '<th>';
        echo 'balance_zero';
        echo '</th>';

        echo '<th>';
        echo 'is_small_amount';
        echo '</th>';

        echo '<th>';
        echo 'is_action';
        echo '</th>';

        echo '<th>';
        echo 'packing';
        echo '</th>';
//
//                echo '<td>';
//                echo 'units'];//                echo '</td>';

        echo '</tr>';

        foreach ($products['SW11SLE03'] as $product) {
//            dd($product['category']);
//                dd($pr);
                echo '<tr>';

                echo '<td>';
                echo $product['category'];
                echo '</td>';

                echo '<td>';
                echo $product['tovar'];
                echo '</td>';

                echo '<td>';
                echo $product['category_id'];
                echo '</td>';

                echo '<td>';
                echo $product['tovar_id'];
                echo '</td>';

                echo '<td>';
                echo $product['artikul'];
                echo '</td>';
//
//                echo '<td>';
//                echo $product['artikul_diy'];
//                echo '</td>';

                echo '<td>';
                echo $product['deleted'];
                echo '</td>';

                echo '<td>';
                echo $product['archive'];
                echo '</td>';

                echo '<td>';
                echo $product['action'];
                echo '</td>';

                echo '<td>';
                echo $product['status'];
                echo '</td>';

                echo '<td>';
                echo $product['not_unload'];
                echo '</td>';

                echo '<td>';
                echo $product['not_unload_site'];
                echo '</td>';

                echo '<td>';
                echo $product['collection_item'];
                echo '</td>';

                echo '<td>';
                echo $product['number_of_patterns'];
                echo '</td>';

                echo '<td>';
                echo $product['country'];
                echo '</td>';

                echo '<td>';
                echo $product['surface_type'];
                echo '</td>';

                echo '<td>';
                echo $product['height'];
                echo '</td>';

                echo '<td>';
                echo $product['width'];
                echo '</td>';

                echo '<td>';
                echo $product['thickness'];
                echo '</td>';

                echo '<td>';
                echo $product['name_for_site'];
                echo '</td>';

                echo '<td>';
                echo $product['Рельеф'];
                echo '</td>';

                echo '<td>';
                echo $product['Ректификация'];
                echo '</td>';

                echo '<td>';
                echo $product['Износостойкость'];
                echo '</td>';

                echo '<td>';
                echo $product['is_Delacora_Big_Format'];
                echo '</td>';

                echo '<td>';
                echo $product['sale'];
                echo '</td>';

                echo '<td>';
                echo $product['balance_zero'];
                echo '</td>';

                echo '<td>';
                echo $product['is_small_amount'];
                echo '</td>';

                echo '<td>';
                echo $product['is_action'];
                echo '</td>';

                echo '<td>';
                echo $product['packing'];
                echo '</td>';
//
//                echo '<td>';
//                echo $product['units'];
//                echo '</td>';

                echo '</tr>';
        }
        echo '</table>';
    }
}
