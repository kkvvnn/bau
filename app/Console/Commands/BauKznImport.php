<?php

namespace App\Console\Commands;

use App\Imports\BauserviceKznImport;
use App\Imports\BauserviceNnImport;
use App\Imports\CollectionsImport;
use App\Imports\BauserviceSpbImport;
use App\Models\BauserviceKzn;
use App\Models\BauserviceNn;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BauKznImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bauservice_kzn:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import and update Bauservice Kazan in database';

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
            BauserviceKzn::truncate();    // clear all data in table

            $url = '/kzn/content/affiliate_new/tt0WmChN.csv';

            $contents = Storage::disk('ftp_bau_spb')->get($url);
            $contents = mb_convert_encoding($contents, 'UTF-8', 'WINDOWS-1251');

            $date = date('Y-m-d_His');
            $name = 'import/bauservice_kzn/bauservice_kzn_'.$date.'.csv';

            Storage::put($name, $contents);

            Excel::import(new BauserviceKznImport(), $name);
            $deleted = BauserviceKzn::where('Picture', null)->delete();
            //        ---------IMPORT-PRODUCT-END---------
        }

        $bar->finish();
        $this->info(' ----- Bauservice Kazan update! [OK]');


//        $this->call('up');

    }
}
