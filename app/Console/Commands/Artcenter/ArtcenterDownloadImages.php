<?php

namespace App\Console\Commands\Artcenter;

use App\Models\Artcenter;
use App\Models\ArtCentreNew;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Exception;

class ArtcenterDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artcenter:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download images from ArtCenter';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
//        $products = Artcenter::where('brand', 'Art Ceramic')
//            ->orWhere('brand', 'Basconi Home')
//            ->orWhere('brand', 'Cube Ceramica')
//            ->orWhere('brand', 'Kerranova')
//            ->get();
        $products = ArtCentreNew::all();

        $bar = $this->output->createProgressBar($products->count());
        $bar->start();

        foreach ($products as $product) {
            foreach ($product->images as $img)
            $this->download_images($img, 'https://media.artcentre.club/', 'artcenter');

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

                $ch = curl_init($string_for_delete . str_replace(' ', '%20', $file_name));
                curl_setopt($ch, CURLOPT_NOBODY, true);
                curl_exec($ch);

                $http_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
                curl_close($ch);

                if ($http_code == 200) {
                    $file = file_get_contents($string_for_delete . str_replace(' ', '%20', $file_name));
                    if ($file != null) {
                        $manager = new ImageManager(['driver' => 'imagick']);
                        $image = $manager->make($file);
                        $image->resize(900, 900, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                        $exif = $image->exif();
                        if (isset($exif['COMPUTED']['Width']) && isset($exif['COMPUTED']['Height']) && (($exif['COMPUTED']['Width'] / $exif['COMPUTED']['Height']) < 0.65)) {
                            $image->rotate(90);
                        }
                        Storage::disk($disk)->put(str_replace('.webp', '.jpg', $file_name), $image->encode());
                    }
                } else {
                    $changes = ArtCentreNew::whereJsonContains('images', $file_name)->get();
                    foreach ($changes as &$change) {
                        $images_all = $change->images;
                        unset($images_all[array_search($file_name, $images_all)]);
                        $change->images = $images_all;
                        $change->save();
                    }
                }
            }
        } catch (Exception $e) {

        }
    }
}
