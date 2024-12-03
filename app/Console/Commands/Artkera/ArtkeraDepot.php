<?php

namespace App\Console\Commands\Artkera;

use App\Models\Artkera\ArtkeraTerritory as Territory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Artkera\ArtkeraDepot as Depot;

class ArtkeraDepot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:depot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera depot';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $bar = $this->output->createProgressBar(1);
        $bar->start();

        Depot::truncate();

        $json = Storage::disk('local')->get('import/altacera/territory/territory.json');
        $products = json_decode($json, true);

        foreach ($products as $product) {

            if ($product['type_price_id'] != '5945b787-12b2-11eb-80eb-00155d5d5700') {
                continue;
            }

            foreach ($product['depots'] as $depot) {
                Depot::create([
                    'price_list' => $product['price_list'],
                    'depot' => $depot['depot'],
                    'depot_id' => $depot['depot_id'],
                    'depot_adress' => $depot['depot_adress'],
                    'depot_display' => $depot['depot_display'],
                    'depot_lat' => $depot['depot_lat'],
                    'depot_lon' => $depot['depot_lon'],
                    'depot_deletion_mark' => $depot['depot_deletion_mark'],
                ]);
            }
        }

        $bar->finish();
        $this->info(' ----- Artkera update Depots [OK]');
    }
}
