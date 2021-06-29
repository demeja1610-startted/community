<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function commentList() {
        $comments =  Comment::query();

        $comments->with(['user', 'commentable']);

        return $comments;
    }

    public function adminSingleComment($comment_id) {
        return Comment::byId($comment_id)->with(['user']);
    }

    public function popularComments() {
        return Comment::with(['user.avatar'])->withCount('plusVoices')->orderByDesc('plus_voices_count');
    }
}
