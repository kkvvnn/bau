<?php

namespace App\Console\Commands;

use App\Imports\CollectionsImport;
use App\Imports\BauserviceSpbImport;
use App\Models\BauserviceSpb;
use App\Models\Collection;
use App\Models\CollectionProduct;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BauSpbImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bauservice_spb:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import and update Bauservice SPB in database';

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
            BauserviceSpb::truncate();    // clear all data in table

            $url = '/spb/content/affiliate_new/Pe0cfkLd.csv';

            $contents = Storage::disk('ftp_bau_spb')->get($url);
            $contents = mb_convert_encoding($contents, 'UTF-8', 'WINDOWS-1251');

            $date = date('Y-m-d_His');
            $name = 'import/bauservice_spb/bauservice_spb_'.$date.'.csv';

            Storage::put($name, $contents);

            Excel::import(new BauserviceSpbImport(), $name);
            $deleted = BauserviceSpb::where('Picture', null)->delete();
            //        ---------IMPORT-PRODUCT-END---------
        }

        $bar->finish();
        $this->info(' ----- Bauservice SPB update! [OK]');


//        $this->call('up');

    }
}
