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
        $bar = $this->output->createProgressBar(1);
        $bar->start();

        TovarAvailable::truncate();

        $use_territory = [
            'Москва',
            'Казань',
//            'Санкт-Петербург',
//            'Краснодар',
//            'Самара',
//            'Ростов-на-Дону',
//            'Новосибирск',
//            'Крым',
//            'Пятигорск',
        ];

        $depots_of_territories = Territory::whereIn('price_list', $use_territory)->get();

        $depots_list = [];
        foreach ($depots_of_territories as $territory) {
            foreach ($territory->depots as $depot) {
                $depots_list[] = $depot->depot_id;
            }
        }

        $products = Tovar::whereHas('balance', function ($query) use ($depots_list) {
            $query->whereIn('depot_id', $depots_list);
        })
//            ->whereBalanceZero(false)
            ->whereNotUnload(false)
            ->whereNotUnloadSite(false)
            ->get()
            ->groupBy('artikul');


        $products = Tovar::has('units_r')
            ->has('images')
            ->has('balance')
            ->whereIn('artikul', $products->keys()->all())->get();

//        $products = $products->reverse();
        $products = $products->unique('artikul');
        $products = $products->toArray();

//        dd($products->count());

        foreach ($products as $product) {

            $brand = Tovar::find($product['id']);
            $product['slug'] = Str::slug(
                $brand->category_r->parent
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

            $unit = Tovar::whereTovarId($product['tovar_id'])
                ->first()
                ->units_r
                ->filter(function ($value){
                    return $value->is_unit_depot;
                })
                ->first();

            $product['unit'] = $unit->unit;
//            $product['unit_id'] = $unit->unit_id;

            TovarAvailable::create($product);
        }

        $bar->finish();
        $this->info(' ----- Artkera update TovarAvailable [OK]');
    }
}
