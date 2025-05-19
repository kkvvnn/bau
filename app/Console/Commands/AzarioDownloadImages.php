<?php

namespace App\Console\Commands;

use App\Models\Artcenter;
use App\Models\Azario;
use App\Models\GlobalTile;
use App\Models\Kerranova;
use App\Models\PrimaveraNew;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Exception;

class AzarioDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'azario:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Azario images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Azario images [START...]');
        $errors = [];

        $products = Azario::get();

        $bar = $this->output->createProgressBar($products->count());
        $bar->start();

        foreach ($products as $product) {
            foreach ($product->images as $img) {
                $this->download_images($img, true, $errors);
            }
            $bar->advance();
        }

        $bar->finish();

        $this->newLine(1);
        $this->info('Azario images downloaded! [OK]');
        $this->newLine(1);
    }


    public function download_images($name, $rotate = true, &$err = false): void
    {

        $string_for_delete = 'https://www.santehcentr.com';
        $name_file = Str::remove($string_for_delete, $name);

        if ($name_file == null) {
            return;
        }

        try {
            if (Storage::disk('azario')->missing($name_file)) {

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

                    Storage::disk('azario')->put($name_file, $image->encode());
                }
            }
        } catch (Exception $e) {
            echo 'Error: ', $e->getMessage(), "\n";
            $err[] = $name;
        }
    }
}
