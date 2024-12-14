<?php

namespace App\Console\Commands;

use App\Models\PixmosaicNew;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class PixmosaicDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pixmosaic:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Pixmosaic images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Pixmosaic images [START...]');

        $products = PixmosaicNew::all();

        $bar = $this->output->createProgressBar($products->count());
        $bar->start();

        foreach ($products as $product) {
            $link = $product->img;
            $path = str_replace(' ', '', $product->vendor_code) . '.jpg';
            $this->download_images($link, $path);
        }

        $bar->finish();

        $this->newLine(1);
        $this->info('Pixmosaic images downloaded! [OK]');
        $this->newLine(1);
    }

    public function download_images($link, $path): void
    {
        if ($link == null) {
            return;
        }

        try {
        if (Storage::disk('pixmosaic')->missing($path)) {

            $file = file_get_contents($link);
            if ($file != null) {
                $manager = new ImageManager(['driver' => 'imagick']);
                $image = $manager->make($file);
                $image->orientate();
//                dd($image->exif());
                $image->resize(900, 900, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $exif = $image->exif();
                if (isset($exif['COMPUTED']['Width']) && isset($exif['COMPUTED']['Height']) && ($exif['COMPUTED']['Width'] < $exif['COMPUTED']['Height'])) {
                    $image->rotate(-90);
                }
                Storage::disk('pixmosaic')->put($path, $image->encode('jpg'));
            }
        }
        } catch (Exception $e) {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }
}
