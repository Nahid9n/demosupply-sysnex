<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $guarded = [];
    protected $casts = [
        'faqs' => 'array',
        'status' => 'integer'
    ];
    public function items() {
        return $this->hasMany(ServiceItem::class, 'service_id');
    }

    public function pricings()
    {
        return $this->hasMany(ServicePricing::class, 'service_id');
    }

    public function gallery()
    {
        return $this->hasMany(ServiceGallery::class, 'service_id');
    }
}
