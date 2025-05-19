<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Azario extends Model
{
    protected $guarded = false;

    protected $casts = [
        'images' => 'array',
    ];

    public function props(): HasOne
    {
        return $this->hasOne(AzarioPriceStock::class, 'vendor_code', 'vendor_code');
    }
}
