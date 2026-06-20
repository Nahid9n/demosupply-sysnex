<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'image_path',
        'caption'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
