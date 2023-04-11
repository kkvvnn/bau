<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'GroupProduct',
        'Element_Code',
        'Owner_Article',
        'Name',
        'Price',
        'RMPrice',
        'RMPriceOld',
        'Producer_Brand',
        'Country_of_manufacture',
        'MainUnit',
        'Novinka',
        'Skidka',
        'balance',
        'balanceCount',
        'Category',
        'Collection_Id',
        'Collection_Code',
        'Collection_Name',
        'Field_of_Application',
        'Place_in_the_Collection',
        'Kratnost',
        'Lenght',
        'Height',
        'Thickness',
        'PCS_in_Package',
        'Package_Value',
        'Package_Weight',
        'Pgabarites',
        'PCSWeight',
        'DesignValue',
        'Color',
        'Cover',
        'Surface',
        'FrostResistance',
        'Rectified',
        'BaseValue',
        'Architectural_surface',
        'Durability',
        'Picture',
        'Picture2',
        'Picture3',
        'Picture4',
        'Picture5',
        'Picture6',
        'Picture7',
        'Picture8',
        'Picture9',
        'Picture10',
        'Picture11',
        'Picture12',
        'Picture13',
        'Picture14',
        'Picture15',
        'Picture16',
        'Picture17',
        'Picture18',
        'Picture19',
        'Picture20',
        'Picture21',
        'Picture22',
        'Picture23',
        'Picture24',
     ];

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'collection_product', 'product_id', 'collection_id');
    }
}
