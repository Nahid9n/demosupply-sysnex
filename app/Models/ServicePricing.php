<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePricing extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'scope_name',
        'estimated_rate'
    ];

    /**
     * Get the master service that owns the specific pricing line matrix.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
