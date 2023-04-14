<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Collection;
use App\Models\CollectionProduct;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TelegramSendController extends Controller
{
    protected $all_tags = [];

    protected function Tag($name): string
    {
        if ($name == null) return '';

        $name = str_replace(',', '', $name);
        $name = str_replace(' ', '_', $name);
        $name = "\n#$name";

        $this->all_tags[] = $name;

        return $name;
    }

    // public function send($count = 1)
    public function send($skip, $count)
    {
        set_time_limit(600);


        

        function sendTelegram($method, $arrayQuery, $token)
        {
            $ch = curl_init('https://api.telegram.org/bot' . $token . '/' . $method);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $res = curl_exec($ch);
            curl_close($ch);
            return $res;
        }
        // $_GET['count'] = 0;
        // $skip = $request->cookie('count');

        // $products = Product::limit($count)->get();
        // $products = Product::offset($request->skip4)->limit($request->count)->get();
        $products = Product::select("*")->where('balance', '1')->skip($skip)->take($count)->get();
        // $products = Product::all();

        
        $skip2 = (int)$skip + (int)$count;

        echo $skip2; echo '<br>';

        // dd($products);
        foreach ($products as $product) {
            $collection_product = CollectionProduct::where('product_id', $product->id)->first();
            $collection = Collection::where('id', $collection_product->collection_id)->first();

            $title = $product->Name;
            $collection_name = $collection->Collection_Name;
            $collection_name_tag = $this->Tag($collection_name);
            $brand = $product->Producer_Brand;
            // $vendor_code = ltrim($product->Element_Code, 'х');
            $vendor_code = $product->Element_Code;

            $usage = $this->Tag($product->Field_of_Application);
            $category = $this->Tag($product->Category);
            $place_in_collection = $this->Tag($product->Place_in_the_Collection);
            $brand_tag = $this->Tag($product->Producer_Brand);
            // $country = $this->Tag($product->Country_of_manufacture);
            $surface = $this->Tag($product->Surface);
            $color = $this->Tag($product->Color);

            $design_value = str_replace(',', '', $product->DesignValue);
            $design_value = $this->Tag($design_value);

            $arch_surf = $product->Architectural_surface;
            if (str_contains($arch_surf, 'Стена') && str_contains($arch_surf, 'Пол')) {
                $arch_surf = 'Стена Пол';
            }
            $architectural_surface = $this->Tag($arch_surf);

            $count = "Count";


            // $img_url = $_REQUEST['img_url'];
            $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
            $name_file = Str::remove($string_for_delete, $product->Picture);
            $img_url = Storage::url('small_img/' . $name_file);
            $img_url = "http://baukv.loc$img_url";
            // $img_url = $product->Picture;

            // $url = Storage::url($name_file); 
            // $url_small = Storage::url('small_img/' . $name_file);
            // // $url = Storage::url($name_file); 

            // // use Illuminate\Support\Str;

            $img_url = Str::swap([
                '.jpeg' => '.jpg',
                '.png' => '.jpg',

            ], $img_url);


            $price = "Price";
            $current_date = date("Y-m-d H:i:s");

            // echo $img_url;

            $msg = "<b>$title</b> \nКоллекция: <b>$collection_name</b> \nАртикул:<b> $vendor_code</b> \nБрэнд: <b>$brand</b> \n";

            $msg .= $collection_name_tag;
            $msg .= $usage;
            $msg .= $category;
            $msg .= $place_in_collection;
            $msg .= $brand_tag;
            $msg .= $design_value;
            // $msg .= $country;
            $msg .= $surface;
            $msg .= $color;
            $msg .= $architectural_surface;



            // $msg = urlencode($msg);
            // $msg = urldecode($msg);

            // dd($msg);

            // $token = '6288254612:AAEn_lvb60hiAGqBK3TZPaSeruQNeBMgl1M';
            // $telegram_admin_id = '1141469797';

            // file_get_contents('https://api.telegram.org/bot'. $token .'/sendMessage?chat_id='. $telegram_admin_id .'&text=' . urlencode($msg));


            $token = '6202535197:AAH5rE7peBBTlPuGPRysCndNtEwtqEiTsIw';

            $arrayQuery = array(
                'chat_id' => -1001933520010,
                'caption' => $msg,
                'photo' => curl_file_create($img_url),
                'parse_mode' => 'html',
                // 'has_spoiler' => true,
            );
            // $ch = curl_init('https://api.telegram.org/bot' . $token . '/sendPhoto');
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_HEADER, false);
            // $res = curl_exec($ch);
            // curl_close($ch);



            sendTelegram('sendPhoto', $arrayQuery, $token);

            sleep(3);
        }

       



        $this->all_tags = array_unique($this->all_tags);
        sort($this->all_tags);
        foreach ($this->all_tags as $tag) {
            echo $tag;
            echo '<br>';
        }
    }
}
