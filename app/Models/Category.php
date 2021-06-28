<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'description',
        'category_id',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'categorizable');
    }

    public function questions()
    {
        return $this->morphedByMany(Question::class, 'categorizable');
    }

    public function scopeById($query, $id) {
        return $query->where('id', $id);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function childrenCategories()
{
    return $this->hasMany(Category::class)->with('categories');
}
}
