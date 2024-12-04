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
        // URL, у которого надо узнать код ответа
//        $url = 'https://service-plitka.ru/storage/images/bauservice/products/Nomenclature/ad4010bf-58ed-439d-9d3d-1eb57d0bfc65/___v8_205B_93a3c.jpeg';
//
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_NOBODY, true);
//        curl_exec($ch);
//
//        $http_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
//        curl_close($ch);
//
//        echo $http_code; // 200

        dd(ArtCentreNew::whereJsonContains('images', 'pictures/atlas-concorde/atlas-concorde-italia/plitka/5.jpg')->get());
    }
}
