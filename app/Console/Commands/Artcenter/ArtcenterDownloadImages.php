<?php

namespace App\Console\Commands\Artcenter;

use App\Models\Artcenter;
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
        $products = Artcenter::where('brand', 'Art Ceramic')
            ->orWhere('brand', 'Basconi Home')
            ->orWhere('brand', 'Cube Ceramica')
            ->orWhere('brand', 'Kerranova')
//            ->orWhere('brand', 'Atlas Concorde Russia')
            ->get();

        $bar = $this->output->createProgressBar($products->count());
        $bar->start();

        foreach ($products as $pr) {
            if ($pr->image1 != '') {
                $this->download_images($pr->image1, 'https://media.artcentre.club/', 'artcenter');
            }
            if ($pr->image2 != '') {
                $this->download_images($pr->image2, 'https://media.artcentre.club/', 'artcenter');
            }
            if ($pr->image3 != '') {
                $this->download_images($pr->image3, 'https://media.artcentre.club/', 'artcenter');
            }
            if ($pr->image4 != '') {
                $this->download_images($pr->image4, 'https://media.artcentre.club/', 'artcenter');
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
        } catch (Exception $e) {

        }
    }
}
