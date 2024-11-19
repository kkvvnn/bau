<?php

namespace App\Console\Commands\Artkera;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Artkera\ArtkeraTerritory as Territory;
use App\Models\Artkera\ArtkeraDepot as Depot;
use App\Models\Artkera\ArtkeraTovar as Tovar;
use App\Models\Artkera\ArtkeraTovarAvailable as TovarAvailable;
use App\Models\Artkera\ArtkeraBalance as Balance;

class ArtkeraTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera test';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $products = TovarAvailable::whereSale(true)->get();

        dd($products);
    }
}
