<?php

namespace App\Console\Commands;

use App\Models\Artcenter;
use App\Models\GlobalTile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Exception;

class GlobalTileDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'global-tile:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download images from Global Tile';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('down', [
            '--refresh' => 15
        ]);

//        ---------DOWNLOAD_COLLECTION_IMAGES----------

        $bar = $this->output->createProgressBar(GlobalTile::count());
        $bar->start();

        $products = GlobalTile::get();

        foreach ($products as $product) {
            $this->download_images($product->image_collection, false);
            $bar->advance();

            break;
        }

        $bar->finish();
        $this->info(' ----- Images collection downloaded! [OK]');
        $this->newLine(2);

//        ---------DOWNLOAD__IMAGES-------

        $bar = $this->output->createProgressBar(GlobalTile::count());
        $bar->start();

        $products = GlobalTile::get();

        foreach ($products as $product) {
            $images_array = $product->images;
            foreach ($images_array as $img) {
                $this->download_images($img);
            }
            $bar->advance();
        }

        $bar->finish();
        $this->info(' ----- Images downloaded! [OK]');

//       -------------------------------------------------


        $this->call('up');
    }


    public function download_images($name, $rotate = true): void
    {
        if ($name == null) {
            return;
        }
        if ($name == '') {
            return;
        }
        $string_for_delete = 'https://gallery.vogtrade.ru/wp-content/uploads/images/';
        $name_file = Str::remove($string_for_delete, $name);

        if ($name_file == null) {
            return;
        }

        try {
            if (Storage::disk('global-tile')->missing($name_file)) {

                $file = file_get_contents('https://gallery.vogtrade.ru/wp-content/uploads/images/' . str_replace(' ', '%20', $name_file));
                if ($file != null) {
                    $manager = new ImageManager(['driver' => 'imagick']);
                    $image = $manager->make($file);
                    $image->resize(900, 900, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    if ($rotate) {
                        $exif = $image->exif();
                        if (isset($exif['COMPUTED']['Width']) && isset($exif['COMPUTED']['Height']) && ($exif['COMPUTED']['Width'] < $exif['COMPUTED']['Height'])) {
                            $image->rotate(90);
                        }
                    }

                    Storage::disk('global-tile')->put($name_file, $image->encode());
                }
            }
        } catch (Exception $e) {
//            echo 'Error: ', $e->getMessage(), "\n";
        }
    }
}
