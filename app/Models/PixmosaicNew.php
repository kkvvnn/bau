<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PixmosaicNew extends Model
{
    protected $guarded = false;

    public function props(): HasOne
    {
        return $this->hasOne(PixmosaicVideo::class, 'vendor_code', 'vendor_code');
    }
}
