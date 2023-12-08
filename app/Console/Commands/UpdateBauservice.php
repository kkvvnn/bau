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

class UpdateBauservice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bauservice:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Bauservice database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $result = 'Fail';

        $this->call('down', [
            '--refresh' => 15
        ]);

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
        $result = 'Product Update';
//        ---------IMPORT-PRODUCT-END---------
//        ---------IMPORT-COLLECTION---------
        Collection::truncate();
        $url = 'http://catalog.bauservice.ru/affiliate_new/nCatg0d8.csv';
        $contents = file_get_contents($url);
        $contents = mb_convert_encoding($contents, 'UTF-8', 'WINDOWS-1251');

        $date = date('Y-m-d_His');
        $name = 'import/collections/collection_'.$date.'.csv';

        Storage::put($name, $contents);

        Excel::import(new CollectionsImport, $name);
        $result .= ' Collection Update';
//        ---------IMPORT-COLLECTION-END---------
//        ----------MANY--------------
        CollectionProduct::truncate();
        $products = Product::all();

        foreach ($products as $product) {

            $collection_number = explode(', ', $product->Collection_Id);
            $collections = Collection::whereIn('Collection_Id', $collection_number)->get();

            foreach ($collections as $collection) {
                $product->collections()->attach($collection->id);
            }
        }
        $result .= ' Таблицы связаны';
//        ----------MANY-END-------------

        $this->call('up');
    }
}
