<?php

namespace App\Console\Commands\GlobalTile;

use App\Models\GlobalTileNew;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class GlobalTileNewDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'global-tile:products-images {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Global Tile images';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $picture_number_of = $this->argument('number');

//        $this->call('down', [
//            '--refresh' => 15
//        ]);

            if ($picture_number_of == 1) {
                $where_pic = '';
            } else {
                $where_pic = $picture_number_of;
            }

            $products_count = GlobalTileNew::where(('Picture' . $where_pic), '!=', '')->count();
            $chunk_size = (int) round($products_count / 100);

            $bar = $this->output->createProgressBar(100);
            $bar->start();

            GlobalTileNew::where(('Picture' . $where_pic), '!=', '')
                ->chunk($chunk_size, function (Collection $products) use ($where_pic, $bar) {
                    $product_pic = 'Picture' . $where_pic;
                    foreach ($products as $product) {
                        $this->download_images_to_storage($product->$product_pic);
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

                    $exif = $image->exif();
                    if (isset($exif['COMPUTED']['Width']) && isset($exif['COMPUTED']['Height']) && ($exif['COMPUTED']['Width'] < $exif['COMPUTED']['Height'])) {
                        $image->rotate(90);
                    }

                    Storage::disk('global-tile')->put($name_file, $image->encode());
                }
            }
        } catch (Exception $e) {
//            echo 'Error: ', $e->getMessage(), "\n";
        }
    }
}
