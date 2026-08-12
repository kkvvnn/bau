<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import All';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('bauservice:import');
        $this->call('artkera:import');
        $this->call('leedo:import');
        $this->call('artcenter:import');
        $this->call('rusplitka:import');
        $this->call('belleza:import');
//        $this->call('keramopro:import');
    }
}
