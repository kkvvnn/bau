<?php

namespace App\Console\Commands\Leedo;

use App\Models\LeedoProduct;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LeedoImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leedo:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Leedo import';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
//        $this->call('down', [
//            '--refresh' => 15
//        ]);

        $this->info('LeeDo [START...]');

        $bar = $this->output->createProgressBar(1);

        $date = date('Y-m-d_His');

        $file = Storage::disk('ftp_leedo')->get('Price.json');
        //      ---------------delete bom----------------------
        $bom = pack('H*', 'EFBBBF');
        $file = preg_replace("/^$bom/", '', $file);
        //      ------------end delete bom-----------------------
        if ($file != null) {
            $name = '/import/leedo/price_' . $date . '.json';
            Storage::disk('local')->put($name, $file);
        }

        Storage::copy($name, str_replace('leedo/', 'leedo/old/', $name));
        Storage::move($name, 'import/leedo/price.json');

        LeedoProduct::truncate();
        $json = Storage::disk('local')->get('import/leedo/price.json');
        $products = json_decode($json, true);
        foreach ($products as $product) {

            if (isset($product['Basic_pic'])) {
                $product['Basic_pic'] = str_replace('https://leedo.ru', 'https://www.leedo.ru', $product['Basic_pic']);
            }
            if (isset($product['Picture1'])) {
                $product['Picture1'] = str_replace('https://leedo.ru', 'https://www.leedo.ru', $product['Picture1']);
            }
            if (isset($product['Picture2'])) {
                $product['Picture2'] = str_replace('https://leedo.ru', 'https://www.leedo.ru', $product['Picture2']);
            }
            if (isset($product['Picture3'])) {
                $product['Picture3'] = str_replace('https://leedo.ru', 'https://www.leedo.ru', $product['Picture3']);
            }
            if (isset($product['Picture4'])) {
                $product['Picture4'] = str_replace('https://leedo.ru', 'https://www.leedo.ru', $product['Picture4']);
            }
            if (isset($product['Picture5'])) {
                $product['Picture5'] = str_replace('https://leedo.ru', 'https://www.leedo.ru', $product['Picture5']);
            }
            if (isset($product['Picture6'])) {
                $product['Picture6'] = str_replace('https://leedo.ru', 'https://www.leedo.ru', $product['Picture6']);
            }
            if (isset($product['Picture7'])) {
                $product['Picture7'] = str_replace('https://leedo.ru', 'https://www.leedo.ru', $product['Picture7']);
            }

            LeedoProduct::create($product);
        }

        $bar->finish();
        $this->info(' ----- Leedo Import to database! [OK]');

//        $this->call('up');
        $this->call('leedo:download-images');

        $this->info('LeeDo [READY...OK]');
    }
}
