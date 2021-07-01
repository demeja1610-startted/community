<?php

namespace App\Repositories;

use App\Models\Question;

class QuestionRepository
{
    public function questionList() {
        return Question::query()->with(['categories', 'tags', 'user', 'user.avatar', 'images'])->withCount('comments');
    }

    public function singlePageQuestion($slug)
    {
        return Question::where('slug', $slug)
            ->with(['categories', 'tags', 'images']);
    }

    public function adminSingleQuestion($article_id) {
        return Question::byId($article_id)
            ->with(['categories', 'tags', 'images']);
    }
}
