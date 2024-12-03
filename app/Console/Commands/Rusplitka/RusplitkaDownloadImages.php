<?php

namespace App\Console\Commands\Rusplitka;

use App\Models\Rusplitka\Collection;
use App\Models\Rusplitka\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class RusplitkaDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rusplitka:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rusplitka download images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::get();

        $bar = $this->output->createProgressBar($products->count());
        $bar->start();

        foreach ($products as $product) {
            foreach ($product->picture as $img) {
                $this->download_images($img, 'https://www.rusplitka.ru/upload/iblock/', 'rusplitka');
            }
            $bar->advance();
        }

        $bar->finish();
        $this->info(' ----- Images downloaded! [OK]');


        //        ---COLLECTION---
        $products = Collection::get();

        $bar = $this->output->createProgressBar($products->count());
        $bar->start();

        foreach ($products as $product) {
            foreach ($product->picture as $img) {
                $this->download_images($img, 'https://www.rusplitka.ru/upload/iblock/', 'rusplitka');
            }
            $bar->advance();
        }

        $bar->finish();
        $this->info(' ----- Images Collection downloaded! [OK]');
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
        } catch (Exception $e) {

        }
    }
}
