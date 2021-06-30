<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function questions()
    {
        return $this->hasMany(Article::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'user_id', 'subscriber_id');
    }

    public function subscriptions()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'subscriber_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function answers()
    {
        return $this->comments()->where('commentable_type', Question::class);
    }

    public function articleComments()
    {
        return $this->comments()->where('commentable_type', Article::class);
    }

    public function commentsByCommentableType(Model $model)
    {
        return $this->comments()->where('commentable_type', get_class($model));
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function voices()
    {
        return $this->hasMany(Voice::class);
    }

    public function avatar()
    {
        return $this->belongsTo(Image::class, 'avatar_id', 'id');
    }
}
