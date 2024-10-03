<?php

namespace App\Console\Commands\GlobalTile;

use Illuminate\Console\Command;

class GlobalTile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'global-tile:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('down', [
            '--refresh' => 15
        ]);

        $this->call('global-tile:download-collection-images');
        $this->newLine(1);

        for ($i = 1; $i <= 24; $i++) {
            $this->call('global-tile:products-images', [
                'number' => $i
            ]);
            $this->info(' ----- Picture'.$i.' [OK]');
        }

        $this->newLine(2);
        $this->call('up');
    }
}
