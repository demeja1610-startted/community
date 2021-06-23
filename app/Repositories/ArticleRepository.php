<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function articleList() {
        return Article::query()->with(['categories', 'tags', 'images'])->withCount(['comments', 'likes']);
    }

    public function singlePageArticle(int $article_id)
    {
        return Article::byId($article_id)
            ->with(['categories', 'tags', 'images'])
            ->withCount(['likes']);
    }
}
