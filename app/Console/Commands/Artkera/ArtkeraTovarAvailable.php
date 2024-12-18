<?php

namespace App\Console\Commands\Artkera;

use App\Models\Altacera\AltaceraTovar;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Artkera\ArtkeraTovar as Tovar;
use App\Models\Artkera\ArtkeraTerritory as Territory;
use App\Models\Artkera\ArtkeraTovarAvailable as TovarAvailable;
use Illuminate\Support\Str;

class ArtkeraTovarAvailable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:tovar-available';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera tovar available';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {


        TovarAvailable::truncate();

        $use_territory = [
            'Москва',
            'Казань',
            'Санкт-Петербург',
//            'Краснодар',
            'Самара',
//            'Ростов-на-Дону',
//            'Новосибирск',
//            'Крым',
//            'Пятигорск',
        ];

        $depots_of_territories = Territory::whereIn('price_list', $use_territory)->get();

        $depots_list = [];
        foreach ($depots_of_territories as $territory) {
            foreach ($territory->depots as $depot) {
                if (!str_contains($depot->depot, 'Некондиция')
                    && !str_contains($depot->depot, 'Оборудование')
                    && !str_contains($depot->depot, 'Стенды')
                ) {
                    $depots_list[$depot->depot] = $depot->depot_id;
                }
            }
        }

        unset($depots_list['Склад Краснодар Новороссийская РАСПРОДАЖА']);
        unset($depots_list['Склад Краснодар Новороссийская']);
        unset($depots_list['Товары в пути (на Краснодар Буфер LCM)']);
        unset($depots_list['Товары в пути (на Буфер Афипский)']);
        unset($depots_list['Товары в пути (на Буфер Афипский Симферополь)']);
        unset($depots_list['Товары в пути (на Краснодар Новороссийская)']);
        unset($depots_list['Склад Краснодар Буфер LCM']);
        unset($depots_list['Склад Буфер Афипский']);

//        dd($depots_list);

        $products = Tovar::whereHas('balance', function ($query) use ($depots_list) {
            $query->whereIn('depot_id', $depots_list);
        })
            ->has('images')
            ->whereNotUnload(false)
            ->whereNotUnloadSite(false)
            ->get()
            ->unique('artikul');

//        dd($products->count());

        $products = $products->toArray();

        $bar = $this->output->createProgressBar(count($products));
        $bar->start();

        foreach ($products as $product) {
            $tovar = Tovar::find($product['id']);
            $product['slug'] = Str::slug(
                $tovar->category_r->parent
                .'-'
                .$product['collection_item']
                .'-'
                .$product['name_for_site']
                .'-'
                .$product['height']
                .'x'
                .$product['width']
                .'-'
                .$product['artikul']
            );

            $product['unit'] = $tovar
                ->units_r
                ->filter(function ($value){
                    return $value->is_unit_depot;
                })
                ->first()
                ->unit;

            $product['massa_pack'] = $tovar
                ->units_r
                ->filter(function ($value){
                    return $value->unit == 'Упак';
                })
                ->first()
                ->unit_kg;

            $unit_ratio_pack = $tovar
                ->units_r
                ->filter(function ($value){
                    return $value->unit == 'Упак';
                })
                ->first()
                ->unit_ratio;

            $unit_ratio_metr = $tovar
                ->units_r
                ->filter(function ($value){
                    return $value->unit == 'м2';
                })
                ->first()
                ->unit_ratio;

            $product['square_in_pack'] = round($unit_ratio_pack / $unit_ratio_metr, 4);

            $product['title'] = $tovar->category_r->parent .' '. $tovar->collection_item .' '. $tovar->name_for_site .' '. $tovar->height .'x'. $tovar->width .' '. $tovar->artikul;

//            -----BALANCE-----
            $balance_kazan = 0;
            $balance_kazan_reserve = 0;
            $balance_kazan_way = 0;
            $balance_kazan_sale = 0;
            $balance_kazan_sale_reserve = 0;

            $balance_moscow = 0;
            $balance_moscow_reserve = 0;
            $balance_moscow_way = 0;
            $balance_moscow_sale = 0;
            $balance_moscow_sale_reserve = 0;
            $balance_moscow_depot_reservnuy = 0;
            $balance_moscow_depot_reservnuy_reserve = 0;

            $balance_spb = 0;
            $balance_spb_reserve = 0;
            $balance_spb_way = 0;
            $balance_spb_sale = 0;
            $balance_spb_sale_reserve = 0;

            $balance_samara = 0;
            $balance_samara_reserve = 0;
            $balance_samara_way = 0;
            $balance_samara_sale = 0;
            $balance_samara_sale_reserve = 0;

            $balances = $tovar->balance;

            foreach ($balances as $balance) {
//                                            KAZAN
                if ($balance['depot_id'] == $depots_list['Склад Казань']) {
                    $balance_kazan = (float)$balance['free_balance'];
                    $balance_kazan_reserve = (float)$balance['reserve'];
                }
                if ($balance['depot_id'] == $depots_list['Товары в пути (на Казань)']) {
                    $balance_kazan_way = (float)$balance['free_balance'];
                }
                if ($balance['depot_id'] == $depots_list['Склад КазаньРАСПРОДАЖА']) {
                    $balance_kazan_sale = (float)$balance['free_balance'];
                    $balance_kazan_sale_reserve = (float)$balance['reserve'];
                }
//                                            MOSCOW
                if ($balance['depot_id'] == $depots_list['Склад Балашиха']) {
                    $balance_moscow = (float)$balance['free_balance'];
                    $balance_moscow_reserve = (float)$balance['reserve'];
                }
                if ($balance['depot_id'] == $depots_list['Товары в пути (на Балашиху)']) {
                    $balance_moscow_way = (float)$balance['free_balance'];
                }
                if ($balance['depot_id'] == $depots_list['Склад Балашиха РАСПРОДАЖА']) {
                    $balance_moscow_sale = (float)$balance['free_balance'];
                    $balance_moscow_sale_reserve = (float)$balance['reserve'];
                }
                if ($balance['depot_id'] == $depots_list['Склад Балашиха РЕЗЕРВНЫЙ']) {
                    $balance_moscow_depot_reservnuy = (float)$balance['free_balance'];
                    $balance_moscow_depot_reservnuy_reserve = (float)$balance['reserve'];
                }

//                                            SPB
                if ($balance['depot_id'] == $depots_list['Склад СанктПетербург']) {
                    $balance_spb = (float)$balance['free_balance'];
                    $balance_spb_reserve = (float)$balance['reserve'];
                }
                if ($balance['depot_id'] == $depots_list['Товары в пути (на СанктПетербург)']) {
                    $balance_spb_way = (float)$balance['free_balance'];
                }
                if ($balance['depot_id'] == $depots_list['Склад СанктПетербургРАСПРОДАЖА']) {
                    $balance_spb_sale = (float)$balance['free_balance'];
                    $balance_spb_sale_reserve = (float)$balance['reserve'];
                }

//                                            SAMARA
                if ($balance['depot_id'] == $depots_list['Склад Самара']) {
                    $balance_samara = (float)$balance['free_balance'];
                    $balance_samara_reserve = (float)$balance['reserve'];
                }
                if ($balance['depot_id'] == $depots_list['Товары в пути (на Самару)']) {
                    $balance_samara_way = (float)$balance['free_balance'];
                }
                if ($balance['depot_id'] == $depots_list['Склад СамараРАСПРОДАЖА']) {
                    $balance_samara_sale = (float)$balance['free_balance'];
                    $balance_samara_sale_reserve = (float)$balance['reserve'];
                }
            }

            $product['kazan'] = $balance_kazan;
            $product['kazan_reserve'] = $balance_kazan_reserve;
            $product['kazan_way'] = $balance_kazan_way;
            $product['kazan_sale'] = $balance_kazan_sale;
            $product['kazan_sale_reserve'] = $balance_kazan_sale_reserve;

            $product['moscow'] = $balance_moscow;
            $product['moscow_reserve'] = $balance_moscow_reserve;
            $product['moscow_way'] = $balance_moscow_way;
            $product['moscow_sale'] = $balance_moscow_sale;
            $product['moscow_sale_reserve'] = $balance_moscow_sale_reserve;
            $product['moscow_depot_reserve'] = $balance_moscow_depot_reservnuy;
            $product['moscow_depot_reserve_reserve'] = $balance_moscow_depot_reservnuy_reserve;

            $product['spb'] = $balance_spb;
            $product['spb_reserve'] = $balance_spb_reserve;
            $product['spb_way'] = $balance_spb_way;
            $product['spb_sale'] = $balance_spb_sale;
            $product['spb_sale_reserve'] = $balance_spb_sale_reserve;

            $product['samara'] = $balance_samara;
            $product['samara_reserve'] = $balance_samara_reserve;
            $product['samara_way'] = $balance_samara_way;
            $product['samara_sale'] = $balance_samara_sale;
            $product['samara_sale_reserve'] = $balance_samara_sale_reserve;
//            -----BALANCE-END-----

            TovarAvailable::create($product);

            $bar->advance();
        }

        $bar->finish();
        $this->info(' ----- Artkera update TovarAvailable [OK]');
    }
}
