<?php

namespace App\Console\Commands\MkPlitka;

use App\Models\Belleza;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BellezaImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'belleza:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Belleza Import (Мир керамики client.mkplitka.ru)';

    public function make_images_array($array, $str) : array
    {
        if ($array === []) {
            $temp = [];
            $temp[] = $str;

            return $temp;
        }

        $images = [];
        foreach ($array as $arr) {
            $images[] = $arr['img'];
        }

        return $images;
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //        $this->call('down', [
//            '--refresh' => 15
//        ]);

        $this->info('Belleza (mkplitka.ru) [START...]');

        $bar = $this->output->createProgressBar(1);

        $products = $this->api_to_array();
//        dd($array['shop']['offers']['offer'][2]);
//        dd($array[100]['Name']);

//        dd($products);


        Belleza::truncate();

        foreach ($products as $product) {
            Belleza::create([
                'name' => $product['Name'],
                'title' => str_replace('Керамогранит ', '', $product['Name']) . ' ' . $product['width'] . 'x' . $product['length'],
                'title_rus' => str_replace('Керамогранит ', '', str_replace("\xC2\xA0", " ", $product['NameRus']??''))/* . ' ' . $product['width'] . 'x' . $product['length']*/,
                'slug' => Str::slug($product['Name']. ' ' . $product['width'] . 'x' . $product['length'] . '-' . $product['ID']),
                'brand' => $product['Brand'],
                'code' => $product['ID'],
                'vendor_code' => $product['Article'],
                'country' => $product['Country'],
                'unit' => $product['Unit'],
                'count_in_pack' => $product['UnitInPack'],
                'collection' => str_replace([' 60х120', ' 60х60', ' 60x120', ' 60x60', ' 20х120'], '', $product['Collection']),
                'sale' => $product['Sale'] == 'true',
                'byOrder' => $product['ByOrder'] == 'true',
                'novelty' => $product['novelty'] == 'true',
                'TradeOnlyPack' => $product['TradeOnlyPack'] == 'true',
                'CollectionNovelty' => $product['CollectionNovelty'] == 'true',
                'Rectified' => (bool) ($product['Rectified']??false == 'true'),
                'Frost_resistance' => (bool) ($product['Frost_resistance']??false == 'true'),
                'Suitable_for_heated_floors' => (bool) ($product['Suitable_for_heated_floors']??false == 'true'),
                'price' => (int)$product['PriceRozn'],
                'price_opt' => (int)$product['PriceDiler2'],
                'size' => $product['size'],
                'length' => $product['length'],
                'width' => $product['width'],
                'thickness' => $product['height']??0,
                'color' => $product['color'],
                'type' => $product['type'],
                'stock' => $product['Rest']['Moskow']['Available']??0,
                'stock_reserv' => $product['Rest']['Moskow']['reserved']??0,
                'stock_all' => $product['Rest']['Moskow']['OnStock']??0,
                'units_m2' => $product['Units']['м2'],
                'units_pallet' => $product['Units']['под']??0,
                'units_pack' => $product['Units']['упак'],
                'units_one' => $product['Units']['шт'],
                'weight' => $product['weight'],
                'isTrash' => $product['isTrash'] == 'true',

                'images' => $this->make_images_array($product['gallery'], $product['image']),
                'Expected' => $product['Expected'],

                'name_rus' => str_replace("\xC2\xA0", " ", $product['NameRus']??''),
                'image_1' => $product['image'],
                'image_2' => $product['image2'],
                'itemCategory' => $product['itemCategory'],
                'surface' => $product['itemSurface'],
                'surface_2' => $product['surface']??'',
                'image_collection' => str_replace(['https://mkplitka.ru/https://mkplitka.ru/', 'https://mkplitka.ru/https://mkplitka.ru/https://mkplitka.ru/'], 'https://mkplitka.ru/', $product['imageCollection']),


//                'code' => $product['id'],
//                'slug' => str_replace('https://www.rusplitka.ru/products/', '', $product['url']),
//                'slug' => Str::slug(),
//                'picture' => is_array($product['picture']) ? $product['picture'] : array($product['picture']),
//
//                'rest_real_free' => $product['rest_real_free'] ?? null,
            ]);
        }

//        $deleted = Belleza::where([
//                ['code', 'СК000045763'],
//                ['code', 'СК000045762'],
//            ])
//            ->delete();

        Belleza::whereIn('code', ['СК000045763', 'СК000045762'])->delete();

        $bar->finish();
        $this->info(' ----- Belleza (mkplitka.ru) Import to database! [OK]');

//        $this->call('up');
//        $this->call('rusplitka:download-images');

        $this->info('Belleza (mkplitka.ru) [READY...OK]');
    }

    public function api_to_array() : array | string
    {
        //        $token = config('services.api.token'); // или env('API_TOKEN')
//        $url = config('services.api.url');    // или env('API_URL')

        $token = 'cyF7kAeU6ez9SLl7Nijymc7KQZGpEJD0slWEVmo7OKk1v5L6b9tCaJBVbtKdjH8f';
//        $url = 'https://api.mkplitka.ru/api/products/%D0%A1%D0%9A000043088';
//        $url_products = 'https://api.mkplitka.ru/api/products';
//        $url_brands = 'https://api.mkplitka.ru/api/brands';
        $url = 'https://api.mkplitka.ru/api/products?filter=%7B"where":%7B"Brand":"BELLEZA ИНДИЯ"%7D %7D';
//        $url = 'https://api.mkplitka.ru/api/products/СК000045385';

        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->get($url);

        if ($response->successful()) {
            // преобразует JSON-ответ в массив
            return $response->json();
        } else {
            // обрабатываем ошибку
            return $response->status();
        }
    }
}
