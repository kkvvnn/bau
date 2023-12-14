<?php

namespace App\Console\Commands;

use App\Imports\CollectionsImport;
use App\Imports\ProductsImport;
use App\Models\Collection;
use App\Models\CollectionProduct;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BauserviceImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bauservice:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import and update Bauservice in database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('down', [
            '--refresh' => 15
        ]);

        $bar = $this->output->createProgressBar(3);
        $bar->start();
        {
            //        ---------IMPORT-PRODUCT---------
            Product::truncate();    // clear all data in table

            $url = 'http://catalog.bauservice.ru/affiliate_new/xQ0ZYpzr.csv';
            $contents = file_get_contents($url);
            $contents = mb_convert_encoding($contents, 'UTF-8', 'WINDOWS-1251');

            $date = date('Y-m-d_His');
            $name = 'import/products/product_'.$date.'.csv';

            Storage::put($name, $contents);

            Excel::import(new ProductsImport, $name);
            $deleted = Product::where('Picture', null)->delete();
            //        ---------IMPORT-PRODUCT-END---------
        }
        $bar->advance();
        {
            //        ---------IMPORT-COLLECTION---------
            Collection::truncate();
            $url = 'http://catalog.bauservice.ru/affiliate_new/nCatg0d8.csv';
            $contents = file_get_contents($url);
            $contents = mb_convert_encoding($contents, 'UTF-8', 'WINDOWS-1251');

            $date = date('Y-m-d_His');
            $name = 'import/collections/collection_'.$date.'.csv';

            Storage::put($name, $contents);

            Excel::import(new CollectionsImport, $name);
            //        ---------IMPORT-COLLECTION-END---------
        }
        $bar->advance();
        {
            //        ----------MANY--------------
            CollectionProduct::truncate();
            $products = Product::where([['GroupProduct', '01 Плитка']])->get();

            foreach ($products as $product) {

                $collection_number = explode(', ', $product->Collection_Id);
                $collections = Collection::whereIn('Collection_Id', $collection_number)->get();

                foreach ($collections as $collection) {
                    $product->collections()->attach($collection->id);
                }
            }
            //        ----------MANY-END-------------
        }
        $bar->finish();
        $this->newLine(3);

        $this->call('up');
        $this->info('The command was successful!');
    }
}
