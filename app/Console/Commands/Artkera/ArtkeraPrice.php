<?php

namespace App\Console\Commands\Artkera;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Artkera\ArtkeraPrice as Price;

class ArtkeraPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera price';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $bar = $this->output->createProgressBar(1);
        $bar->start();

        Price::truncate();

        $json = Storage::disk('local')->get('import/altacera/price/price.json');
        $products = json_decode($json, true);

        foreach ($products as $product) {
            if ($product['type_price_id'] != '5945b787-12b2-11eb-80eb-00155d5d5700') {
                continue;
            }
            foreach ($product['price_list'] as $price) {
                Price::create([
                   'type_price_id' => $product['type_price_id'],
                   'tovar_id' => $price['tovar_id'],
                   'unit_id' => $price['unit_id'],
                   'price' => $price['price'],
                ]);
            }
        }

        $bar->finish();
        $this->info(' ----- Artkera update Price [OK]');
    }
}
