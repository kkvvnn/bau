<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keramopro extends Model
{
    protected $guarded = false;

    protected $casts = [
        'images' => 'array',
    ];
}
