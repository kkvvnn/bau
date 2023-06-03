<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AquaFloor extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'collection',
        'collection_url',
        'price',
        'description_collection',
        'cound_decors',
        'type_ucladki',
        'material',
        'faska',
        'podlozhka',
        'vendor_codes',
        'zashit_sloi',
        'CPL',
        'class_iznosost',
        'lenght',
        'width',
        'fat',
        'meters_in_pack',
        'count_in_pack',
        'meters_in_palet',
        'massa_pack',
        'zamok',
        'srok',
        'class_pozhar',
        'img_1',
        'img_2',
        'img_3',

    ];
}
