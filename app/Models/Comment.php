<?php

namespace App\Models;

use App\Traits\HasVoices;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, HasVoices;

    protected $fillable = [
        'body',
        'user_id',
        'parent_id',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
