<?php

namespace App\Console\Commands;

use App\Models\Collection;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class BauserviceDownloadCollectionImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bauservice:collections-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Collections images from Bauservice';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('down', [
            '--refresh' => 15
        ]);

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
        $this->info('The command was successful!');
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
