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

//        $unique_unit_id = [];
//        foreach ($products as $product) {
//            foreach ($product['units'] as $unit) {
//                if (!in_array($unit['unit_id'], $unique_unit_id)) {
//                    Unit::create($unit);
//                    $unique_unit_id[] = $unit['unit_id'];
//                }
//            }
//        }

        $unique_tovar_id = [];
        foreach ($products as $product) {
            if (!in_array($product['tovar_id'], $unique_tovar_id)) {
                foreach ($product['units'] as $unit) {
                    Unit::create([
                        'tovar_id' => $product['tovar_id'],
                        'unit' => $unit['unit'],
                        'unit_id' => $unit['unit_id'],
                        'unit_kg' => $unit['unit_kg'],
                        'unit_ratio' => $unit['unit_ratio'],
                        'unit_code' => $unit['unit_code'],
                        'is_unit_depot' => $unit['is_unit_depot'],
                        'is_unit_metr' => $unit['is_unit_metr'],
                        'is_unit_piece' => $unit['is_unit_piece'],
                        'is_unit_pack' => $unit['is_unit_pack'],
                        'is_unit_pallet' => $unit['is_unit_pallet'],
                    ]);
                }
                $unique_tovar_id[] = $product['tovar_id'];
            }
        }

        $bar->finish();
        $this->info(' ----- Artkera update Unit [OK]');
    }
}
