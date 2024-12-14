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
        $ch = curl_init(str_replace(' ', '%20', 'https://media.artcentre.club/pictures/atlas-concorde/atlas-concorde-russia/Symphonyx/Gold/Symphonyx_Gold_120x278_1.jpg'));
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);

        $http_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        dd($http_code);
    }
}
