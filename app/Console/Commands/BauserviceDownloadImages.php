<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
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
    public function handle(int $disk = 1)
    {
        $this->call('down', [
            '--refresh' => 15
        ]);

//        $bar = $this->output->createProgressBar(3);
//        $bar->start();
//        sleep(1);
//        $bar->advance();
//        sleep(1);
//        $bar->advance();
//        sleep(1);
//        $bar->finish();
//        $this->newLine(3);


        if ($disk == 1) {
            $where_pic = '';
        } else {
            $where_pic = $disk;
        }

        $products = Product::where(('Picture'.$where_pic), '!=', null)->get();

        $product_pic = 'Picture'.$where_pic;

        foreach ($products as $product) {
            $this->mydown($product->$product_pic, $product_pic);
        }


        $this->call('up');
        $this->info('The command was successful!');
//        $this->error('Something went wrong!');
    }

    public function mydown($name, $public_n)
    {
        if ($name == null) {
            return;
        }
        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
        $name_file = Str::remove($string_for_delete, $name);

        if ($name_file == null) {
            return;
        }

        if (Storage::disk('public')->missing($public_n.'/'.$name_file)) {

            $file = Storage::disk('ftp')->get($name_file);
            if ($file != null) {
                $manager = new ImageManager(['driver' => 'imagick']);
//                $image = $manager->make($file)->resize(300);
                $image = $manager->make($file);
                $image->resize(900, 900, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                Storage::disk('public')->put($public_n.'/'.$name_file, $image->encode());
            }
        }
    }
}
