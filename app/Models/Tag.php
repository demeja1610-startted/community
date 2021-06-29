<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function questions()
    {
        return $this->morphedByMany(Question::class, 'taggable');
    }

    public function scopeById($query, $id) {
        return $query->where('id', $id);
    }
}
