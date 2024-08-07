<?php

namespace App\Console\Commands\GlobalTile;

use App\Models\GlobalTileNew;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class GlobalTileNewDownloadCollectionImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'global-tile:download-collection-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Global Tile Collection images';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $products_count = GlobalTileNew::where('image_collection', '!=', '')->count();
        $chunk_size = (int) round($products_count / 100);

        $bar = $this->output->createProgressBar(100);
        $bar->start();

        GlobalTileNew::where('image_collection', '!=', '')
            ->chunk($chunk_size, function (Collection $products) use ($bar) {
                foreach ($products as $product) {
                    $this->download_images_to_storage($product->image_collection);
                }
                $bar->advance();
            });

        $bar->finish();


//        $this->call('up');
//        $this->info('-----[OK]');
    }

    private function download_images_to_storage($name): void
    {
        if ($name == null) {
            return;
        }
        $string_for_delete = 'https://gallery.vogtrade.ru/wp-content/uploads/images/';
        $name_file = Str::remove($string_for_delete, $name);

        if ($name_file == null) {
            return;
        }

        try {
            if (Storage::disk('global-tile')->missing($name_file)) {

                $file = file_get_contents('https://gallery.vogtrade.ru/wp-content/uploads/images/' . str_replace(' ', '%20', $name_file));
                if ($file != null) {
                    $manager = new ImageManager(['driver' => 'imagick']);
                    $image = $manager->make($file);
                    $image->resize(900, 900, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

//                    $exif = $image->exif();
//                    if (isset($exif['COMPUTED']['Width']) && isset($exif['COMPUTED']['Height']) && ($exif['COMPUTED']['Width'] < $exif['COMPUTED']['Height'])) {
//                        $image->rotate(90);
//                    }

                    Storage::disk('global-tile')->put($name_file, $image->encode());
                }
            }
        } catch (Exception $e) {
//            echo 'Error: ', $e->getMessage(), "\n";
        }
    }
}
