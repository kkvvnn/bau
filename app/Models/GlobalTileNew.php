<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GlobalTileNew extends Model
{
    protected $guarded = false;

    protected $casts = [
        'images' => 'array',
    ];

    public function adds(): HasOne
    {
        return $this->hasOne(GlobalTilePriceStock::class, 'vendor_code', 'vendor_code');
    }
}
