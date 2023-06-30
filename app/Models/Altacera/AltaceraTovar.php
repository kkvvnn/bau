<?php

namespace App\Models\Altacera;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AltaceraTovar extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $casts = [
        'units' => 'array',
    ];
}
