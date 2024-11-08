<?php

namespace App\Console\Commands\Artkera;

use App\Models\Altacera\AltaceraTerritory;
use App\Models\Collection;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use App\Models\Artkera\ArtkeraTerritory as Territory;

class ArtkeraTerritory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:territory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera territory';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $bar = $this->output->createProgressBar(1);
        $bar->start();

        Territory::truncate();

        $json = Storage::disk('local')->get('import/altacera/territory/territory.json');
        $products = json_decode($json, true);

        foreach ($products as $product) {
            foreach ($product['depots'] as $depot) {
                Territory::create([
                   'price_list' => $product['price_list'],
                   'type_price' => $product['type_price'],
                   'type_price_id' => $product['type_price_id'],
                   'depot' => $depot['depot'],
                   'depot_id' => $depot['depot_id'],
                   'depot_adress' => $depot['depot_adress'],
                ]);
            }
        }

        $bar->finish();
        $this->info(' ----- Artkera update territory [OK]');
    }
}
