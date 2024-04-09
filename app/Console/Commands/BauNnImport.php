<?php

namespace App\Console\Commands;

use App\Imports\BauserviceNnImport;
use App\Imports\CollectionsImport;
use App\Imports\BauserviceSpbImport;
use App\Models\BauserviceNn;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BauNnImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bauservice_nn:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import and update Bauservice Nizhniy Novgorod in database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $this->call('down', [
//            '--refresh' => 15
//        ]);

        $bar = $this->output->createProgressBar(1);
        $bar->start();
        {
            //        ---------IMPORT-PRODUCT---------
            BauserviceNn::truncate();    // clear all data in table

            $url = '/nn/content/affiliate_new/yC0aeHtm.csv';

            $contents = Storage::disk('ftp_bau_spb')->get($url);
            $contents = mb_convert_encoding($contents, 'UTF-8', 'WINDOWS-1251');

            $date = date('Y-m-d_His');
            $name = 'import/bauservice_nn/bauservice_nn_'.$date.'.csv';

            Storage::put($name, $contents);

            Excel::import(new BauserviceNnImport(), $name);
            $deleted = BauserviceNn::where('Picture', null)->delete();
            //        ---------IMPORT-PRODUCT-END---------
        }

        $bar->finish();
        $this->info(' ----- Bauservice NN update! [OK]');


//        $this->call('up');

    }
}
