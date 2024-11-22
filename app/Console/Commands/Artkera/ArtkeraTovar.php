<?php

namespace App\Console\Commands\Artkera;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Artkera\ArtkeraTovar as Tovar;

class ArtkeraTovar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:tovar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera tovar';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $bar = $this->output->createProgressBar(1);
        $bar->start();

        Tovar::truncate();

        $json = Storage::disk('local')->get('import/altacera/tovar/tovar.json');
        $products = json_decode($json, true);

        foreach ($products as $product) {
            Tovar::create($product);
        }

        $bar->finish();
        $this->info(' ----- Artkera update Tovar [OK]');
    }
}
