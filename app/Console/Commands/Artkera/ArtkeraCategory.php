<?php

namespace App\Console\Commands\Artkera;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Artkera\ArtkeraCategory as Category;

class ArtkeraCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera category';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $bar = $this->output->createProgressBar(1);
        $bar->start();

        Category::truncate();

        $json = Storage::disk('local')->get('import/altacera/category/category.json');
        $products = json_decode($json, true);

        foreach ($products as $product) {
                Category::create($product);
        }

        $bar->finish();
        $this->info(' ----- Artkera update category [OK]');
    }
}
