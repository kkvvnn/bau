<?php

namespace App\Console\Commands\Artkera;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Artkera\ArtkeraPicture as Picture;

class ArtkeraImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artkera:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artkera import all to database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info(' ----- Artkera import ALL [START...]');

        $this->call('artkera:unzip');
        $this->call('artkera:territory');
        $this->call('artkera:depot');
        $this->call('artkera:category');
        $this->call('artkera:picture');
        $this->call('artkera:price');
        $this->call('artkera:balance');
        $this->call('artkera:tovar');
        $this->call('artkera:unit');
        $this->call('artkera:tovar-available');
        $this->call('artkera:download-images');

        $this->info(' ----- Artkera import ALL [OK]');
    }
}
