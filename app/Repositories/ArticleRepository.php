<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function singlePageArticle(int $article_id)
    {
        return Article::byId($article_id)
            ->with(['categories', 'tags', 'images'])
            ->withCount(['likes']);
    }
}
