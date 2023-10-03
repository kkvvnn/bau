<?php

namespace App\Models\Rusplitka;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'rusplitka_products';

//    protected $casts = [
//        'picture' => 'array'
//    ];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'code');
    }
}
