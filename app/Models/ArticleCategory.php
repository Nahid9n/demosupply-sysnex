<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug','status'];

    protected static function boot() {
        parent::boot();
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    // একটি ক্যাটাগরির অধীনে অনেক আর্টিকেল থাকতে পারে
    public function articles() {
        return $this->hasMany(Article::class,'category_id','id');
    }
}
