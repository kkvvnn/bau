<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class BauserviceDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bauservice:products-images {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Products images from Bauservice';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $picture_number_of = $this->argument('number');

        $this->call('down', [
            '--refresh' => 15
        ]);

        try {
            if ($picture_number_of == 1) {
                $where_pic = '';
            } else {
                $where_pic = $picture_number_of;
            }

            $products_count = Product::where(('Picture' . $where_pic), '!=', null)->count();
            $chunk_size = (int) round($products_count / 100);

            $bar = $this->output->createProgressBar(100);
            $bar->start();

            Product::where(('Picture' . $where_pic), '!=', null)
                ->chunk($chunk_size, function (Collection $products) use ($where_pic, $bar) {
                    $product_pic = 'Picture' . $where_pic;
                    foreach ($products as $product) {
                        $this->download_images_to_storage($product->$product_pic);
                    }
                    $bar->advance();
            });

            $bar->finish();
            $this->newLine(3);

        } catch (\Illuminate\Database\QueryException $exception) {
            $this->call('up');
            $this->error($exception->getMessage());
        }

        $this->call('up');
        $this->info('The command was successful!');
    }

    private function download_images_to_storage($name): void
    {
        if ($name == null) {
            return;
        }
        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
        $name_file = Str::remove($string_for_delete, $name);

        if ($name_file == null) {
            return;
        }

        if (Storage::disk('public')->missing($name_file)) {
            $file = Storage::disk('ftp')->get($name_file);
            if ($file != null) {
                $manager = new ImageManager(['driver' => 'imagick']);
                $image = $manager->make($file);
                $image->resize(900, 900, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                Storage::disk('public')->put($name_file, $image->encode());
            }
        }
    }
}
