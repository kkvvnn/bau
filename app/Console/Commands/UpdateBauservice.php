<?php

namespace App\Console\Commands;

use App\Imports\CollectionsImport;
use App\Imports\ProductsImport;
use App\Models\Collection;
use App\Models\CollectionProduct;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\ImageManager;
use Image;

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
//        ---------IMPORT-COLLECTION-END---------
//        ----------MANY--------------
        CollectionProduct::truncate();
        $products = Product::where(['GroupProduct', '01 Плитка']);

        foreach ($products as $product) {

            $collection_number = explode(', ', $product->Collection_Id);
            $collections = Collection::whereIn('Collection_Id', $collection_number)->get();

            foreach ($collections as $collection) {
                $product->collections()->attach($collection->id);
            }
        }
//        ----------MANY-END-------------


//        ---------DOWNLOAD_COLLECTION_IMAGES----------
        $collections_ids = $this->all_collections_array_list();

        $collections = Collection::find($collections_ids);

        foreach ($collections as $collection) {
            $list_pic = $collection->Interior_Pic;
            $arr_pic = explode(', ', $list_pic);

            foreach ($arr_pic as $pic) {
                $this->download_collection_images($pic);
            }
        }
//        ---------DOWNLOAD_COLLECTION_IMAGES-END-------

        $this->call('up');
    }

    public function all_collections_array_list(): array
    {
        $array = [];
        $collects_ids = DB::table('collection_product')
            ->select('collection_id')
            ->distinct()
//            ->limit(10)
            ->get();

        foreach ($collects_ids as $collect_id) {
            $array[] = $collect_id->collection_id;
        }

        return $array;
    }

    public function download_collection_images($name): void
    {
        if ($name == null) {
            return;
        }
        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
        $name_file = Str::remove($string_for_delete, $name);

        if ($name_file == null) {
            return;
        }

        if (Storage::disk('collections')->missing($name_file)) {

            $file = Storage::disk('ftp')->get($name_file);
            if ($file != null) {
                $manager = new ImageManager(['driver' => 'imagick']);
//                $image = $manager->make($file)->resize(300);
                $image = $manager->make($file);
                $image->resize(900, 900, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                Storage::disk('collections')->put($name_file, $image->encode());
            }
        }
    }
}
