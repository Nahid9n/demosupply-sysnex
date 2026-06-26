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
    public function seo()
    {
        return $this->morphOne(SeoManagement::class, 'model', 'model_type', 'model_id');
    }

    protected static function booted()
    {
        static::deleting(function ($service) {
            $service->seo()->delete();
        });
    }
    public function subServices()
    {
        return $this->hasMany(Service::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }
}
