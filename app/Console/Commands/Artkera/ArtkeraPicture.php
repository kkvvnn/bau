<?php

namespace App\Console\Commands\Artkera;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Artkera\ArtkeraPicture as Picture;

class ArtkeraPicture extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:picture';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera picture';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $bar = $this->output->createProgressBar(1);
        $bar->start();

        Picture::truncate();

        $json = Storage::disk('local')->get('import/altacera/picture/picture.json');
        $products = json_decode($json, true);

        foreach ($products as $product) {
                Picture::create($product);
        }

        $bar->finish();
        $this->info(' ----- Artkera update Picture [OK]');
    }
}
