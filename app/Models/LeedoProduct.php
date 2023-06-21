<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeedoProduct extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $casts = [
        'Style' => 'array',
        'Color_solution' => 'array',
    ];
}
