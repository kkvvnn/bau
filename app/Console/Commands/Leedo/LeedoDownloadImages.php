<?php

namespace App\Console\Commands\Leedo;

use App\Models\LeedoProduct;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class LeedoDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leedo:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Leedo download images';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $products = LeedoProduct::all();

        $bar = $this->output->createProgressBar($products->count());
        $bar->start();

        foreach ($products as $pr) {
            if ($pr->Basic_pic != '') {
                $this->download_images($pr->Basic_pic, 'https://www.leedo.ru/pictures/', 'leedo-images');
            }
            if ($pr->Picture1 != '') {
                $this->download_images($pr->Picture1, 'https://www.leedo.ru/pictures/', 'leedo-images');
            }
            if ($pr->Picture2 != '') {
                $this->download_images($pr->Picture2, 'https://www.leedo.ru/pictures/', 'leedo-images');
            }
            if ($pr->Picture3 != '') {
                $this->download_images($pr->Picture3, 'https://www.leedo.ru/pictures/', 'leedo-images');
            }
            if ($pr->Picture4 != '') {
                $this->download_images($pr->Picture4, 'https://www.leedo.ru/pictures/', 'leedo-images');
            }
            if ($pr->Picture5 != '') {
                $this->download_images($pr->Picture5, 'https://www.leedo.ru/pictures/', 'leedo-images');
            }
            if ($pr->Picture6 != '') {
                $this->download_images($pr->Picture6, 'https://www.leedo.ru/pictures/', 'leedo-images');
            }
            if ($pr->Picture7 != '') {
                $this->download_images($pr->Picture7, 'https://www.leedo.ru/pictures/', 'leedo-images');
            }

            $bar->advance();
        }

        $bar->finish();
        $this->info(' ----- Images downloaded! [OK]');
    }

    public function download_images(string $name, string $string_for_delete, string $disk): void
    {
        if ($name == null || $name == '') {
            return;
        }

        $file_name = Str::remove($string_for_delete, $name);

        try {
            if (Storage::disk($disk)->missing($file_name)) {

                $file = file_get_contents($string_for_delete . str_replace(' ', '%20', $file_name));
                if ($file != null) {
                    $manager = new ImageManager(['driver' => 'imagick']);
                    $image = $manager->make($file);
                    $image->resize(900, 900, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $exif = $image->exif();
                    if (isset($exif['COMPUTED']['Width']) && isset($exif['COMPUTED']['Height']) && ($exif['COMPUTED']['Width'] < $exif['COMPUTED']['Height'])) {
                        $image->rotate(90);
                    }
                    Storage::disk($disk)->put($file_name, $image->encode());
                }
            }
        } catch (\Exception $e) {

        }
    }
}
