<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    use HasFactory;
    // Mass assignment control logic bounds
    protected $fillable = [
        'service_id',
        'title',
        'description'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
