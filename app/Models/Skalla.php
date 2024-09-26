<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skalla extends Model
{
    protected $guarded = false;

    protected $casts = [
        'images' => 'array',
    ];
}
