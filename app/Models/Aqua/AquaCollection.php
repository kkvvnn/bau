<?php

namespace App\Models\Aqua;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AquaCollection extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function units(): HasMany
    {
        return $this->hasMany(Aqua::class, 'collection', 'collection');
    }
}
