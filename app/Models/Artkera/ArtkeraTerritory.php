<?php

namespace App\Models\Artkera;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArtkeraTerritory extends Model
{
    protected $guarded = false;

    public function depots(): HasMany
    {
        return $this->hasMany(ArtkeraDepot::class, 'price_list', 'price_list');
    }
}
