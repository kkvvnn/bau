<?php

namespace App\Console\Commands;

use App\Models\Artcenter;
use App\Models\GlobalTile;
use App\Models\Kerranova;
use App\Models\PrimaveraNew;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Exception;

class KerranovaDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kerranova:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Kerranova images';

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

        $bar = $this->output->createProgressBar(Kerranova::count());
        $bar->start();

        $products = Kerranova::get();

        foreach ($products as $product) {
            foreach ($product->images as $img) {
//                dd($img);
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

        $string_for_delete = 'https://lk.kerranova.ru/storage/images/products/';
        $name_file = Str::remove($string_for_delete, $name);

        if ($name_file == null) {
            return;
        }

        try {
            if (Storage::disk('kerranova')->missing($name_file)) {

                $arrContextOptions = stream_context_create ([
                    "ssl" => [
                        "verify_peer"=>false,
                        "verify_peer_name"=>false,
                    ],
                ]);

                $file = file_get_contents($string_for_delete . $name_file, false, $arrContextOptions);
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

                    Storage::disk('kerranova')->put($name_file, $image->encode());
                }
            }
        } catch (Exception $e) {
            echo 'Error: ', $e->getMessage(), "\n";
            $err[] = $name;
        }
    }
}
