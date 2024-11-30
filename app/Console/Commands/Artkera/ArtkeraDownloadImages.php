<?php

namespace App\Console\Commands\Artkera;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Artkera\ArtkeraPicture as Picture;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class ArtkeraDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera save images into storage';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $bar = $this->output->createProgressBar(Picture::count());
        $bar->start();

        $products = Picture::get();

        foreach ($products as $product) {
            foreach ($product->images as $img) {
                $this->download_images($img, true);
            }
            $bar->advance();
        }

        $bar->finish();
        $this->info(' ----- Images downloaded! [OK]');
    }

    public function download_images($name, $rotate = true): void
    {
        if ($name == null) {
            return;
        }
        if ($name == '') {
            return;
        }
        $string_for_delete = 'https://artkera.ru/';
        $name_file = Str::remove($string_for_delete, $name);

        if ($name_file == null) {
            return;
        }

        try {
            if (Storage::disk('artkera')->missing($name_file)) {

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

                    Storage::disk('artkera')->put($name_file, $image->encode());
                }
            }
        } catch (Exception $e) {

        }
    }
}
