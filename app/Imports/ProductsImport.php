<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ProductsImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
        'GroupProduct' => $row['groupproduct'],
        'Element_Code' => $row['element_code'],
        'Owner_Article' => $row['owner_article'],
        'Name' => $row['name'],
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
        'PCS_in_Package' => $row['pcs_in_package'],
        'Package_Value' => $row['package_value'],
        'Package_Weight' => $row['package_weight'],
        'Pgabarites' => $row['pgabarites'],
        'PCSWeight' => $row['pcsweight'],
        'DesignValue' => $row['designvalue'],
        'Color' => $row['color'],
        'Cover' => $row['cover'],
        'Surface' => $row['surface'],
        'FrostResistance' => $row['frostresistance'],
        'Rectified' => $row['rectified'],
        'BaseValue' => $row['basevalue'],
        'Architectural_surface' => $row['architectural_surface'],
        'Durability' => $row['durability'],
        'Picture' => $row['picture'],
        'Picture2' => $row['picture2'],
        'Picture3' => $row['picture3'],
        'Picture4' => $row['picture4'],
        'Picture5' => $row['picture5'],
        'Picture6' => $row['picture6'],
        'Picture7' => $row['picture7'],
        'Picture8' => $row['picture8'],
        'Picture9' => $row['picture9'],
        'Picture10' => $row['picture10'],
        'Picture11' => $row['picture11'],
        'Picture12' => $row['picture12'],
        'Picture13' => $row['picture13'],
        'Picture14' => $row['picture14'],
        'Picture15' => $row['picture15'],
        'Picture16' => $row['picture16'],
        'Picture17' => $row['picture17'],
        'Picture18' => $row['picture18'],
        'Picture19' => $row['picture19'],
        'Picture20' => $row['picture20'],
        'Picture21' => $row['picture21'],
        'Picture22' => $row['picture22'],
        'Picture23' => $row['picture23'],
        'Picture24' => $row['picture24'],
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'Name';
    }
}
