<?php

namespace App\Models\Artkera;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtkeraDepot extends Model
{
    protected $guarded = false;

    public function territory(): BelongsTo
    {
        return $this->belongsTo(ArtkeraTerritory::class, 'price_list', 'price_list');
    }
}
