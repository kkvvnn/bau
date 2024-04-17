<?php

namespace App\Console\Commands;

use App\Models\Product;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class BauserviceDownloadImagesText extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bauservice:products-images-text {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Products images from Bauservice add Text';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $picture_number_of = $this->argument('number');

//        $this->call('down', [
//            '--refresh' => 15
//        ]);

        try {
            if ($picture_number_of == 1) {
                $where_pic = '';
            } else {
                $where_pic = $picture_number_of;
            }

            $products = Product::where('GroupProduct', '=', '01 Плитка')
                ->where('RMPrice', '>=', 700)
                ->where('Picture' . $where_pic, '!=', '')
                ->where('Producer_Brand', '=', 'Laparet')
                ->whereColumn('RMPrice', '>', 'Price')
                ->get()
                ->filter(function (Product $product) {
                    return $product->balance == 1
                        || (isset($product->kzn->balance) && $product->kzn->balance == 1)
                        || (isset($product->spb->balance) && $product->spb->balance == 1);
                })
                ->filter(function (Product $product) {
                    $length = (int)$product->Lenght;
                    $height = (int)$product->Height;
                    return ($length >= 119 && $length <= 121 && $height >= 59 && $height <= 61)         //60x120
                        || ($length >= 59 && $length <= 61 && $height >= 59 && $height <= 61)           //60x60
                        || ($length >= 79 && $length <= 81 && $height >= 79 && $height <= 81)           //80x80
                        || ($length >= 159 && $length <= 161 && $height >= 79 && $height <= 81)         //80x160
                        || ($length >= 119 && $length <= 121 && $height >= 19 && $height <= 21);        //20x120
                });
            $products_count = $products->count();

            $id_s = [];
            foreach ($products as $product) {
                $id_s[] = $product->id;
            }

            $chunk_size = (int)round($products_count / 100);

            $bar = $this->output->createProgressBar(100);
            $bar->start();

            Product::whereIn('id', $id_s)
                ->chunk($chunk_size, function (Collection $products) use ($where_pic, $bar) {
                    $product_pic = 'Picture' . $where_pic;
                    foreach ($products as $product) {
                        $this->add_text_to_image($product->$product_pic, $product);
                    }
                    $bar->advance();
                });

            $bar->finish();

        } catch (\Illuminate\Database\QueryException $exception) {
            $this->call('up');
            $this->error($exception->getMessage());
        }

//        $this->call('up');
//        $this->info('-----[OK]');
    }

    private function add_text_to_image($name, Product $product): void
    {
        if ($name == null) {
            return;
        }
        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
        $name_file = Str::remove($string_for_delete, $name);


        if ($name_file == null) {
            return;
        }
        try {
            if (Storage::disk('public-text')->missing($name_file)) {
                $file = Storage::disk('public')->get($name_file);
                if ($file != null) {
                    $manager = new ImageManager(['driver' => 'imagick']);
                    $image = $manager->make($file);

                    if ($product->Height && $product->Lenght) {
                        $lenght = round((float)str_replace(',', '.', $product->Lenght), -1, PHP_ROUND_HALF_EVEN);
                        $height = round((float)str_replace(',', '.', $product->Height), -1, PHP_ROUND_HALF_EVEN);
                        $string = $product->Producer_Brand . ' ' . $product->collections[0]->Collection_Name . ' ' . $height . 'x' . $lenght;
                    } else {
                        $string = $product->Producer_Brand . ' ' . $product->collections[0]->Collection_Name;
                    }


                    $image->text($string, 25, 50, function ($font) use ($product) {
                        $font->file(public_path('fonts/sfns-display-bold.ttf'));
                        $font->size(40);
                        if ((stripos($product->Color, 'елый') !== false)
                            || (stripos($product->Color, 'ерый') !== false)
                            || (stripos($product->Color, 'ежевый') !== false)
                            || (stripos($product->Color, 'ремовый') !== false)
                            || (stripos($product->Name, 'елый') !== false)
                            || (stripos($product->Name, 'ерый') !== false)
                            || (stripos($product->Name, 'ежевый') !== false)
                            || (stripos($product->Name, 'ремовый') !== false)) {
                            $font->color([0, 0, 0, 0.8]);
                        } else {
                            $font->color([255, 255, 255, 0.8]);
                        }
                        if ((stripos($product->Name, 'еталлизир') !== false)) {
                            $font->color([255, 255, 255, 0.8]);
                        }

//                        $font->color('#C71585');
//                        $font->align('center');
//                        $font->valign('top');
//                        $font->angle(45);
                    });
//                $exif = $image->exif();
//                if (isset($exif['COMPUTED']['Width']) && isset($exif['COMPUTED']['Height']) && ($exif['COMPUTED']['Width'] < $exif['COMPUTED']['Height'])) {
//                    $image->rotate(-90);
//                }
                    Storage::disk('public-text')->put($name_file, $image->encode());
                }

            }
        } catch (Exception $e) {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }
}
