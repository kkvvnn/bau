<?php

namespace App\Console\Commands;

use App\Models\Artcenter;
use App\Models\GlobalTile;
use App\Models\PrimaveraNew;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Exception;

class PrimaveraNewDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'primavera:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Primavera images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('down', [
            '--refresh' => 15
        ]);

//        ---------DOWNLOAD_COLLECTION_IMAGES----------

        $errors = [];

        $bar = $this->output->createProgressBar(PrimaveraNew::count());
        $bar->start();

        $products = PrimaveraNew::get();

        foreach ($products as $product) {
            $this->download_images($product->image_collection, false, $errors);
            $bar->advance();
        }

        $bar->finish();
        $this->info(' ----- Images collection downloaded! [OK]');
        $this->newLine(2);

//        ---------DOWNLOAD__IMAGES-------

        $bar = $this->output->createProgressBar(PrimaveraNew::count());
        $bar->start();

        $products = PrimaveraNew::get();

        foreach ($products as $product) {
            $images_array = $product->images;
            foreach ($images_array as $img) {
                $this->download_images($img, true, $errors);
            }
            $bar->advance();
        }

        $bar->finish();
        $this->info(' ----- Images downloaded! [OK]');

//        $this->newLine(2);
//        dd($errors);
//       -------------------------------------------------


        $this->call('up');
    }


    public function download_images($name, $rotate = true, &$err = false): void
    {
        if ($name == null) {
            return;
        }
        if ($name == '') {
            return;
        }
        $string_for_delete = 'https://domix-club.ru/upload/iblock/';
        $name_file = Str::remove($string_for_delete, $name);

        if ($name_file == null) {
            return;
        }

        try {
            if (Storage::disk('primavera-new')->missing($name_file)) {

                $file = file_get_contents($string_for_delete . str_replace(' ', '%20', $name_file));
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

                    Storage::disk('primavera-new')->put($name_file, $image->encode());
                }
            }
        } catch (Exception $e) {
//            echo 'Error: ', $e->getMessage(), "\n";
            $err[] = $name;
//            $image_not_found = PrimaveraNew::query()
//                ->whereJsonContains('images', 'https://domix-club.ru/upload/iblock/24d/bsmu34qohhpk67uinb2feer939dsvu09/keramogranit_primavera_golden_black_grit_granula_60x120_sm_gg203.jpg')
//                ->get();

//            dd($image_not_found);
        }
    }
}
