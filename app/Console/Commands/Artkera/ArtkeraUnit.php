<?php

namespace App\Console\Commands\Artkera;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Artkera\ArtkeraUnit as Unit;

class ArtkeraUnit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:unit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera unit';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $bar = $this->output->createProgressBar(1);
        $bar->start();

        Unit::truncate();

        $json = Storage::disk('local')->get('import/altacera/tovar/tovar.json');
        $products = json_decode($json, true);

        $unique_unit_id = [];
        foreach ($products as $product) {
            foreach ($product['units'] as $unit) {
                if (!in_array($unit['unit_id'], $unique_unit_id)) {
                    Unit::create($unit);
                    $unique_unit_id[] = $unit['unit_id'];
                }
            }
        }

        $bar->finish();
        $this->info(' ----- Artkera update Unit [OK]');
    }
}
