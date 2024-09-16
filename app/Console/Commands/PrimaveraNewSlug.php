<?php

namespace App\Console\Commands;

use App\Models\Artcenter;
use App\Models\GlobalTile;
use App\Models\PrimaveraNew;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Exception;

class PrimaveraNewSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'primavera:slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Slug Primavera';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('down', [
            '--refresh' => 15
        ]);



        $bar = $this->output->createProgressBar(PrimaveraNew::count());
        $bar->start();

        $products = PrimaveraNew::get();

        foreach ($products as $product) {
            $product->slug = Str::slug($product->brand.'-'.$product->title);
            $product->save();
            $bar->advance();
        }

        $bar->finish();
        $this->info(' ----- Primavera Slugs ready! [OK]');
        $this->newLine(2);


        $this->call('up');
    }
}
