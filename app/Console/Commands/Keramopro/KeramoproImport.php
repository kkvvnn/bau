<?php

namespace App\Console\Commands\Keramopro;

use App\Models\Keramopro;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KeramoproImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'keramopro:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Keramopro Import';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Keramopro update [START...]');

        $this->saveXmlFile();

        $array = $this->xml_to_array();

//        dd($array['offer']);

        $products = $array['offer'];
        Keramopro::truncate();
        foreach ($products as $product) {
            if (isset($product['picture'])) {
                Keramopro::create([
                    'vendor_code' => $product['param'][4],
                    'code' => $product['param'][5],
                    'type' => 'Керамогранит',
                    'title' => $product['name'],
                    'slug' => Str::slug('Novin Ceram-'.$product['name']),
                    'collection' => ucfirst(strtolower(explode(' ', $product['name'])[0])),
                    'brand' => 'Novin Ceram',
                    'country' => 'Иран',
                    'url' => $product['url'],
                    'currency' => $product['currencyId'],
                    'price_opt' => $product['price'],
                    'price' => $product['param'][3],
                    'unit' => $product['param'][2],
                    'balance' => str_replace(',', '.', $product['stock']),
                    'format' => $product['param'][9],
                    'length' => $product['param'][0],
                    'width' => $product['param'][1],
                    'fat' => 20,
                    'surface' => ucfirst_rus($product['param'][6]),
                    'color' => ucfirst_rus($product['param'][7]),
                    'design' => ucfirst_rus($product['param'][8]),
                    'main_image' => $product['param'][10] ?? null,
                    'images' => $this->images_to_array($product['picture']),
                ]);
            }
        }

        $this->call('keramopro:download-images');
        $this->info('Keramopro READY [OK!]');
    }

    private function saveXmlFile(): void
    {
        $url = "https://keramoproshop.ru/feed/sku_th.xml";

        $contents = file_get_contents($url);
        Storage::disk('local')->put('import/keramopro/example.xml', $contents);

    }

    private function xml_to_array() : array
    {
        $xmlString = Storage::disk('local')->get('import/keramopro/example.xml');
        $xmlObject = simplexml_load_string($xmlString, null, LIBXML_NOCDATA);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);

        return $phpArray;
    }

    private function images_to_array(array|string $images): array
    {
        if(!is_array($images)) {
            $arr = explode('###notinstr###', $images);
        } else {
            $arr = $images;
        }

        foreach ($arr as &$a) {
            if ($a == 'https://keramoproshop.ru/menu/keramogranit-jura-dark-grey-20mm/') {
                $a = 'https://keramoproshop.ru/wp-content/uploads/2024/03/jura-dark-gray.jpg';
            }
            if ($a == 'https://keramoproshop.ru/menu/keramogranit-jura-light-grey-20mm-2/') {
                $a = 'https://keramoproshop.ru/wp-content/uploads/2024/03/jura-light-gray.jpg';
            }
        }

        return array_reverse($arr);
    }
}
