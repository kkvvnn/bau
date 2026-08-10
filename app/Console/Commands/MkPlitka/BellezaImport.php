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

    public function make_images_array($arr) : array
    {
        $images = [];
        foreach ($arr as $a) {
            $images[] = $a[0];
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



        Belleza::truncate();

        foreach ($products as $product) {
            Belleza::create([
                'name' => $product['Name'],
                'slug' => Str::slug($product['Name']),
                'brand' => $product['Brand'],
                'code' => $product['ID'],
                'vender_code' => $product['Article'],
                'country' => $product['Country'],
                'unit' => $product['Unit'],
                'count_in_pack' => $product['UnitInPack'],
                'collection' => $product['Collection'],
                'sale' => $product['Sale'] == 'true',
                'byOrder' => $product['ByOrder'] == 'true',
                'price' => $product['PriceRozn'],
                'price_opt' => $product['PriceDiler2'],
                'length' => $product['length'],
                'width' => $product['width'],
                'thickness' => $product['height'],
                'color' => $product['color'],
                'type' => $product['type'],
                'stock' => $product['Rest']['Moskow']['Available'],
                'stock_reserv' => $product['Rest']['Moskow']['reserved'],
                'stock_all' => $product['Rest']['Moskow']['OnStock'],
                'units_m2' => $product['Units']['м2'],
                'units_pallet' => $product['Units']['под'],
                'units_pack' => $product['Units']['упак'],
                'units_one' => $product['Units']['упак'],
                'weight' => $product['weight'],
                'isTrash' => $product['isTrash'] == 'true',

                'images' => make_images_array($product['gallery']),

                'name_rus' => $product['name_rus'],
                'surface' => $product['itemSurface'],
                'image_collection' => $product['image_collection'],


                'code' => $product['id'],
//                'slug' => str_replace('https://www.rusplitka.ru/products/', '', $product['url']),
                'slug' => Str::slug(),
                'picture' => is_array($product['picture']) ? $product['picture'] : array($product['picture']),

                'rest_real_free' => $product['rest_real_free'] ?? null,
            ]);
        }

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

        $token = '3epGIyqB5umFPzYKgobvBMaYRe28AkML2Si8yG2uvGx4BohLmVUGhrvNyCJgRpBn';
//        $url = 'https://api.mkplitka.ru/api/products/%D0%A1%D0%9A000043088';
//        $url_products = 'https://api.mkplitka.ru/api/products';
//        $url_brands = 'https://api.mkplitka.ru/api/brands';
        $url_brands = 'https://api.mkplitka.ru/api/products?filter=%7B"where":%7B"Brand":"BELLEZA ИНДИЯ"%7D %7D';


        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->get($url_brands);

        if ($response->successful()) {
            // преобразует JSON-ответ в массив
            return $response->json();
        } else {
            // обрабатываем ошибку
            return $response->status();
        }
    }
}
