<?php

namespace App\Models\Rusplitka;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'rusplitka_collections';

//    protected $casts = [
//        'picture' => 'array'
//    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'collection_id', 'code');
    }
}
