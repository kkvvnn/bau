<?php

namespace App\Models\Aqua;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Aqua extends Model
{

    protected $guarded = false;

    public function stock(): HasOne
    {
        return $this->hasOne(AquaStock::class, 'vendor_code', 'vendor_code');
    }

    public function collection_relation(): HasOne
    {
        return $this->hasOne(AquaCollection::class, 'collection', 'collection');
    }
}
