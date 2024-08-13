<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PrimaveraNew extends Model
{
    protected $guarded = false;

    protected $casts = [
        'images' => 'array',
        'for_room' => 'array',
    ];

    public function price(): HasOne
    {
        return $this->hasOne(PrimaveraPriceList::class, 'vendor_code', 'vendor_code');
    }
}
