<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'categorizable');
    }

    public function questions()
    {
        return $this->morphedByMany(Question::class, 'categorizable');
    }
}
