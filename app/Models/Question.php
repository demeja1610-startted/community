<?php

namespace App\Models;

use App\Models\Category;
use App\Traits\HasComments;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory, HasSlug, HasComments;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function bookmarks() {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }

    public function likes() {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

    public function scopeById($query, $id) {
        return $query->where('id', $id);
    }
}
