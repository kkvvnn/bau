<?php

namespace App\Console\Commands\Test;

use Illuminate\Console\Command;

class Two extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:two';

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
        echo 123;
        $this->info('2 Command');
    }
}
