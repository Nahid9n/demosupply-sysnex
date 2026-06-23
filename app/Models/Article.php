<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot() {
        parent::boot();
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }

    public function category() {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function seo() {
        return $this->morphOne(SeoManagement::class, 'model', 'model_type', 'model_id');
    }

    protected static function booted()
    {
        static::deleting(function ($article) {
            $article->seo()->delete();
        });
    }
}
