<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BauserviceNn extends Model
{
    protected $guarded = false;

    public function msk(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'Element_Code', 'Element_Code');
    }
}
