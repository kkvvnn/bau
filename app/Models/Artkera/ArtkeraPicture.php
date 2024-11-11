<?php

namespace App\Models\Artkera;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtkeraPicture extends Model
{
    protected $guarded = false;

    protected $casts = [
        'images' => 'array',
    ];
}
