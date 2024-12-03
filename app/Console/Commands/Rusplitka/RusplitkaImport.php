<?php

namespace App\Console\Commands\Rusplitka;

use App\Models\Rusplitka\Collection;
use App\Models\Rusplitka\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RusplitkaImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rusplitka:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rusplitka Import';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //        $this->call('down', [
//            '--refresh' => 15
//        ]);

        $this->info('RUSPLITKA [START...]');

        $bar = $this->output->createProgressBar(1);

        $this->saveXmlFile();
        $array = $this->xml_to_array();
//        dd($array['shop']['offers']['offer'][2]);
//        dd($array);

        $collections = $array['shop']['collections']['collection'];
        Collection::truncate();
        foreach ($collections as $collection) {
            Collection::create([
                'code' => $collection['@attributes']['id'],
                'picture' => is_array($collection['picture']) ? $collection['picture'] : array($collection['picture']),
                'url' => $collection['url'],
                'type' => $collection['type'],
                'name' => $collection['name'],
                'country' => $collection['country_of_origin'],
                'brand' => $collection['brand'],
                'is_new' => json_encode($collection['is_new']),
            ]);
        }

        $products = $array['shop']['offers']['offer'];
        Product::truncate();
        $ii = 0;
        foreach ($products as $product) {
            Product::create([
                'code' => $product['@attributes']['id'],
                'collection_id' => $product['collection_id'],
//                'picture' => is_array($product['picture']) ? implode(' | ', $product['picture']) : $product['picture'],
                'picture' => is_array($product['picture']) ? $product['picture'] : array($product['picture']),
                'url' => $product['url'],
                'external_id' => $product['external_id'] ?? null,
                'name' => $product['name'],
                'articul' => $product['articul'] ?? null,
                'svoystvo' => $product['svoystvo'] ?? null,
                'size_a' => $product['size_a'] ?? null,
                'size_b' => $product['size_b'] ?? null,
                'unit' => $product['unit'] ?? null,
                'currency' => $product['currency'] ?? null,
                'weight' => $product['weight'] ?? null,
                'in_pack_sht' => $product['in_pack_sht']  ?? null,
                'in_pack_m2' => $product['in_pack_m2']  ?? null,
                'thickness' => $product['thickness'] ?? null,
                'surface' => $product['surface'] ?? null,
                'country_of_origin' => $product['country_of_origin'] ?? null,
                'brand_name' => $product['brand_name'] ?? null,
                'price' => $product['price'] ?? null,
                'price_rozn' => $product['price_rozn'] ?? null,
                'rest_skald_ljubercy' => $product['rest_skald_ljubercy'] ?? null,
                'rest_skald_ljubercy_rezerv' => $product['rest_skald_ljubercy_rezerv'] ?? null,
                'rest_skald_bronnicy' => $product['rest_skald_bronnicy'] ?? null,
                'rest_skald_bronnicy_rezerv' => $product['rest_skald_bronnicy_rezerv'] ?? null,
                'rest_skald_20t' => $product['rest_skald_20t'] ?? null,
                'rest_skald_20t_rezerv' => $product['rest_skald_20t_rezerv'] ?? null,
                'rest_skald_krasnodar' => $product['rest_skald_krasnodar'] ?? null,
                'rest_skald_krasnodar_rezerv' => $product['rest_skald_krasnodar_rezerv'] ?? null,
                'rest_real_free' => $product['rest_real_free'] ?? null,
            ]);
        }

        $bar->finish();
        $this->info(' ----- RUSPLITKA Import to database! [OK]');

//        $this->call('up');
        $this->call('rusplitka:download-images');

        $this->info('RUSPLITKA [READY...OK]');
    }

    public function xml_to_array() : array
    {
        $xmlString = Storage::disk('local')->get('import/rusplitka/example.xml');
//        $xmlString = iconv("UTF-8", "windows-1251", $xmlString);
        $xmlObject = simplexml_load_string($xmlString, null, LIBXML_NOCDATA);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);

//        dd($phpArray['shop']['offers']['offer']);
//        dd($phpArray['shop']['offers']['offer']);

        return $phpArray;
    }

    public function saveXmlFile()
    {
//        $url = "https://opt.rusplitka.ru/opt-feed.xml";
        $url = "https://rusplitka.ru/upload/feed/opt-feed.xml";

        $date = date("Y-m-d_His");

        $contents = file_get_contents($url);
//        $contents = iconv("windows-1251","UTF-8", $contents);
//        Storage::disk('local')->put('import/rusplitka/example.xml', $contents);
        Storage::disk('local')->put('import/rusplitka/rusplitka_'.$date.'.xml', $contents);
        Storage::disk('local')->copy('import/rusplitka/rusplitka_'.$date.'.xml', 'import/rusplitka/example.xml');

    }
}
