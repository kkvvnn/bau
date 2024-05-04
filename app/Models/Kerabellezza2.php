<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kerabellezza2 extends Model
{
    protected $guarded = false;

    public function parent(): HasOne
    {
        return $this->hasOne(Kerabellezza::class, 'vendor_code', 'parent_code');
    }
}
