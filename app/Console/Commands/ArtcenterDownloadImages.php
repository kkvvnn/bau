<?php

namespace App\Console\Commands;

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
    public function handle()
    {
//        $this->call('down', [
//            '--refresh' => 15
//        ]);

//        ---------DOWNLOAD_COLLECTION_IMAGES----------
        $count = Artcenter::where('brand', 'Art Ceramic')
            ->orWhere('brand', 'Prime Ceramics')
            ->count();
//        dd($count);
        $chunk_size = (int)round($count / 10);

        $bar = $this->output->createProgressBar($count);
        $bar->start();

        $product = Artcenter::where('brand', 'Art Ceramic')
            ->orWhere('brand', 'Prime Ceramics')
            ->get();
        $chunks = $product->chunk($chunk_size);
//        dd($chunks);

        foreach ($product->chunk($chunk_size) as $chunk) {
            foreach ($chunk as $pr) {
                $images = [];
                if ($pr->image1 != '') {
                    $images[] = $pr->image1;
                }
                if ($pr->image2 != '') {
                    $images[] = $pr->image2;
                }
                if ($pr->image3 != '') {
                    $images[] = $pr->image3;
                }
                if ($pr->image4 != '') {
                    $images[] = $pr->image4;
                }
                foreach ($images as $i) {
                    $this->download_images($i);
                }
            }
            $bar->advance();
        }

        $bar->finish();

//        ---------DOWNLOAD_COLLECTION_IMAGES-END-------
//        $this->call('up');
        $this->info(' ----- Images downloaded! [OK]');
    }


    public function download_images($name): void
    {
        if ($name == null) {
            return;
        }
        if ($name == '') {
            return;
        }
        $string_for_delete = 'https://media.artcentre.club/';
        $name_file = Str::remove($string_for_delete, $name);

        if ($name_file == null) {
            return;
        }

        try {
            if (Storage::disk('artcenter')->missing($name_file)) {

                $file = file_get_contents('https://media.artcentre.club/' . str_replace(' ', '%20', $name_file));
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
                    Storage::disk('artcenter')->put($name_file, $image->encode());
                }
            }
        } catch (Exception $e) {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }
}
