<?php

namespace App\Traits;

use App\Models\Comment;

trait HasComments
{
    public function comments()
    {
        /**
         * replies.replyTo - Nested relationship
         */
        return $this->morphMany(Comment::class, 'commentable')
            ->whereNull('parent_id')
            ->with(['user', 'replies.replyTo', 'replies.user']);
    }
}
