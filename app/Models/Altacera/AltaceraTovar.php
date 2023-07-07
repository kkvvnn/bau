<?php

namespace App\Models\Altacera;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AltaceraTovar extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $casts = [
        'units' => 'array',
    ];

    public function price(): HasOne
    {
        return $this->hasOne(AltaceraPrice::class, 'tovar_id', 'tovar_id');
    }

    public function picture(): HasOne
    {
        return $this->hasOne(AltaceraPicture::class, 'uid', 'tovar_id');
    }

    public function category_rel(): HasOne
    {
        return $this->hasOne(AltaceraCategory::class, 'category_id', 'category_id');
    }

    public function balance(): HasOne
    {
        return $this->hasOne(AltaceraBalance::class, 'tovar_id', 'tovar_id');
    }
}
