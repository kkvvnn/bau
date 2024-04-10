<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $guarded = false;

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collection_product');
    }

    public function spb(): HasOne
    {
        return $this->hasOne(BauserviceSpb::class, 'Element_Code', 'Element_Code');
    }

    public function nn(): HasOne
    {
        return $this->hasOne(BauserviceNn::class, 'Element_Code', 'Element_Code');
    }

    public function kzn(): HasOne
    {
        return $this->hasOne(BauserviceKzn::class, 'Element_Code', 'Element_Code');
    }

    public function reject(\Closure $param)
    {
    }
}
