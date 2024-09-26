<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Skalla extends Model
{
    protected $guarded = false;

    protected $casts = [
        'images' => 'array',
    ];

    public function price(): HasOne
    {
        return $this->hasOne(SkallaPriceList::class, 'vendor_code', 'vendor_code');
    }
}
