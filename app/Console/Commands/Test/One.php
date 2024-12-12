<?php

namespace App\Console\Commands\Test;

use App\Models\ArtCentreNew;
use Illuminate\Console\Command;

class One extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:one';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = ArtCentreNew::get()->groupBy('brand')->toArray();

        dd(array_keys($products));

        $products = ArtCentreNew::whereBrand('Art Ceramic')
            ->whereJsonLength('images', '>', 0)
            ->get();

//        foreach ($products as $product) {
//            if ($product->images === array()) {
//                echo 22;
//            }
//        }

        dd($products->count());
    }
}
