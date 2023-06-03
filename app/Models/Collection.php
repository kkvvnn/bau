<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'Collection_Id',
        'Collection_Name',
        'Interior_Pic',
    ];

    // protected $guarded = true;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'collection_product');
    }
}
