<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BauserviceSpb extends Model
{
    protected $guarded = false;

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collection_product');
    }
}
