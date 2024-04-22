<?php

namespace App\Models\NTCeramic;

use App\Models\Altacera\AltaceraPrice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NtCeramicNoImgs extends Model
{
    protected $guarded = false;

    public function referer(): HasOne
    {
        return $this->hasOne(NtCeramicWithImgs::class, 'vendor_code', 'vendor_code');
    }
}
