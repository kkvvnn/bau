<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-images';

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
        $this->info('Download Images [START...]');
        $this->info('--------------------------');
        $this->newLine(1);

        $this->call('pixmosaic:download-images');
        $this->call('kerranova:download-images');
        $this->call('global-tile:download-images');
//        $this->call('azario:download-images');

        $this->info('Download Images [OK]');
    }
}
