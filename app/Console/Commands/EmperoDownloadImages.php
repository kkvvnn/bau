<?php

namespace App\Console\Commands;

use App\Models\Empero;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class EmperoDownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empero:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Empero images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('down', [
            '--refresh' => 15
        ]);

        $products = Empero::where('title', 'not like', '% 2 %')->get();
        foreach ($products as $product) {
            //download product images
            foreach ($product->images as $i) {
                $name = mb_substr($i['images-href'], mb_strpos($i['images-href'], 'src=') + 4);
//                $name = urlencode($name);
                $this->download_images($name);
            }
            //download collection images
            foreach ($product->img_collection as $i_c) {
                $name = mb_substr($i_c['img_collection-src'], mb_strpos($i_c['img_collection-src'], 'src=') + 4);
//                $name = urlencode($name);
                $this->download_images($name);
            }
        }

        $this->call('up');
        $this->info('The command was successful!');
    }

    public function download_images($name): void
    {
        if ($name == null) {
            return;
        }

        if (Storage::disk('empero')->missing($name)) {

            $file = file_get_contents('https://empero.info/'.str_replace(' ', '%20', $name));
            if ($file != null) {
                $manager = new ImageManager(['driver' => 'imagick']);
                $image = $manager->make($file);
                $image->orientate();
//                dd($image->exif());
                $image->resize(900, 900, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $exif = $image->exif();
                if (isset($exif['COMPUTED']['Width']) && isset($exif['COMPUTED']['Height']) && ($exif['COMPUTED']['Width'] < $exif['COMPUTED']['Height'])) {
                    $image->rotate(-90);
                }
                Storage::disk('empero')->put($name, $image->encode());
            }
        }
    }
}
