<?php

namespace App\Console\Commands;

use App\Models\Aqua\Aqua;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Exception;

class AquaDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aqua:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Aquafloor images';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $bar = $this->output->createProgressBar(Aqua::count());
        $bar->start();

        $products = Aqua::get();

        foreach ($products as $product) {
            $this->download_images($product->image, true);
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
        $domain = 'https://aqua-floor.com';
        $name_file = $name;

        try {
            if (Storage::disk('aquafloor')->missing($name_file)) {

                $file = file_get_contents($domain . str_replace(' ', '%20', $name_file));
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

                    Storage::disk('aquafloor')->put($name_file, $image->encode());
                }
            }
        } catch (Exception $e) {

        }
    }
}
