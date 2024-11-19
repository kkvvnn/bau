<?php

namespace App\Models\Artkera;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ArtkeraTovarAvailable extends Model
{
    protected $guarded = false;

    protected $casts = [
        'artikul_diy' => 'array',
        'units' => 'array',
    ];

    public function category_r(): HasOne
    {
        return $this->hasOne(ArtkeraCategory::class, 'category_id', 'category_id');
    }

    public function balance(): HasMany
    {
        return $this->hasMany(ArtkeraBalance::class, 'tovar_id', 'tovar_id');
    }

    public function units_r(): HasMany
    {
        return $this->hasMany(ArtkeraUnit::class, 'tovar_id', 'tovar_id');
    }

    public function price(): HasOne
    {
        return $this->hasOne(ArtkeraPrice::class, 'tovar_id', 'tovar_id');
    }

    public function images(): HasOne
    {
        return $this->hasOne(ArtkeraPicture::class, 'uid', 'tovar_id');
    }
}
