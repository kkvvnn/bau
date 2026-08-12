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
            unset($product['Противоскольжение']);   // 30.05.25 change struct of file tovar.json (add new field 'Противоскольжение')
            unset($product['out']);                 // 08.07.25 change struct of file tovar.json (add new field 'out')
            unset($product['Спецэффект']);          // 01.08.25 change struct of file tovar.json (add new field 'Спецэффект')
            unset($product['Категория']);           // 01.08.25 change struct of file tovar.json (add new field 'Категория')
            unset($product['is_DIY']);                  // 29.06.26
            unset($product['is_time_action']);          // 29.06.26
            unset($product['time_action_date_from']);   // 29.06.26
            unset($product['time_action_date_to']);     // 29.06.26

//            rrr
            Tovar::create($product);
        }

        $bar->finish();
        $this->info(' ----- Artkera update Tovar [OK]');
    }
}
