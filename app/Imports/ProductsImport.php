<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ProductsImport implements ToModel, WithHeadingRow, WithUpserts, WithChunkReading
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'GroupProduct' => $row['groupproduct'],
            'Element_Code' => $row['element_code'],
            'Owner_Article' => $row['owner_article'],
            'Name' => $row['name'],
            'slug' => STR::slug($row['producer_brand'].'-'.$row['name']),
            'Price' => $row['price'],
            'RMPrice' => $row['rmprice'],
            'RMPriceOld' => $row['rmpriceold'],
            'Producer_Brand' => $row['producer_brand'],
            'Country_of_manufacture' => $row['country_of_manufacture'],
            'MainUnit' => $row['mainunit'],
            'Novinka' => $row['novinka'],
            'Skidka' => $row['skidka'],
            'balance' => $row['balance'],
            'balanceCount' => $row['balancecount'],
            'Category' => $row['category'],
            'Collection_Id' => $row['collection_id'],
            'Collection_Code' => $row['collection_code'],
            'Collection_Name' => $row['collection_name'],
            'Field_of_Application' => $row['field_of_application'],
            'Place_in_the_Collection' => $row['place_in_the_collection'],
            'Kratnost' => $row['kratnost'],
            'Lenght' => $row['lenght'],
            'Height' => $row['height'],
            'Thickness' => $row['thickness'],
            'Width' => $row['width'],
            'Depth' => $row['depth'],
            'PCS_in_Package' => $row['pcs_in_package'],
            'Package_Value' => $row['package_value'],
            'Package_Weight' => $row['package_weight'],
            'Pgabarites' => $row['pgabarites'],
            'PCSWeight' => $row['pcsweight'],
            'DesignValue' => $row['designvalue'],
            'Color' => $row['color'],
            'Cover' => $row['cover'],
            'SpoutHeight' => $row['spoutheight'],
            'WaterSupply' => $row['watersupply'],
            'WaterOutlet' => $row['wateroutlet'],
            'WaterDraining' => $row['waterdraining'],
            'Surface' => $row['surface'],
            'FrostResistance' => $row['frostresistance'],
            'Rectified' => $row['rectified'],
            'Form' => $row['form'],
            'Orientation' => $row['orientation'],
            'TypeOfinstallation' => $row['typeofinstallation'],
            'Volume' => $row['volume'],
            'Package_bundle' => $row['package_bundle'],
            'Warrantysuper' => $row['warrantysuper'],
            'BaseValue' => $row['basevalue'],
            'Architectural_surface' => $row['architectural_surface'],
            'Durability' => $row['durability'],
            'Rashod' => $row['rashod'],
            'TempoNanese' => $row['temponanese'],
            'Propo' => $row['propo'],
            'Worktime' => $row['worktime'],
            'SrokGod' => $row['srokgod'],
            'NormaUp' => $row['normaup'],
            'Gotovn' => $row['gotovn'],
            'Adgezon' => $row['adgezon'],
            'Type' => $row['type'],
            'Power' => $row['power'],
            'Voltage' => $row['voltage'],
            'Vivod' => $row['vivod'],
            'Picture' => str_replace('\\', '/', $row['picture']),
            'Picture2' => str_replace('\\', '/', $row['picture2']),
            'Picture3' => str_replace('\\', '/', $row['picture3']),
            'Picture4' => str_replace('\\', '/', $row['picture4']),
            'Picture5' => str_replace('\\', '/', $row['picture5']),
            'Picture6' => str_replace('\\', '/', $row['picture6']),
            'Picture7' => str_replace('\\', '/', $row['picture7']),
            'Picture8' => str_replace('\\', '/', $row['picture8']),
            'Picture9' => str_replace('\\', '/', $row['picture9']),
            'Picture10' => str_replace('\\', '/', $row['picture10']),
            'Picture11' => str_replace('\\', '/', $row['picture11']),
            'Picture12' => str_replace('\\', '/', $row['picture12']),
            'Picture13' => str_replace('\\', '/', $row['picture13']),
            'Picture14' => str_replace('\\', '/', $row['picture14']),
            'Picture15' => str_replace('\\', '/', $row['picture15']),
            'Picture16' => str_replace('\\', '/', $row['picture16']),
            'Picture17' => str_replace('\\', '/', $row['picture17']),
            'Picture18' => str_replace('\\', '/', $row['picture18']),
            'Picture19' => str_replace('\\', '/', $row['picture19']),
            'Picture20' => str_replace('\\', '/', $row['picture20']),
            'Picture21' => str_replace('\\', '/', $row['picture21']),
            'Picture22' => str_replace('\\', '/', $row['picture22']),
            'Picture23' => str_replace('\\', '/', $row['picture23']),
            'Picture24' => str_replace('\\', '/', $row['picture24']),
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'Element_Code';
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
