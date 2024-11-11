<?php

namespace App\Console\Commands\Artkera;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Artkera\ArtkeraBalance as Balance;

class ArtkeraBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:balance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera balance';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Balance::truncate();

        $json = Storage::disk('local')->get('import/altacera/balance/balance.json');
        $products = json_decode($json, true);

        $bar = $this->output->createProgressBar(count($products));
        $bar->start();

        foreach ($products as $product) {
                Balance::create($product);

                $bar->advance();
        }

        $bar->finish();
        $this->info(' ----- Artkera update Balance [OK]');
    }
}
