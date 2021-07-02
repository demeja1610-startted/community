<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function articleList() {
        return Article::query()->with(['categories', 'tags', 'user', 'user.avatar', 'images'])->withCount(['comments', 'likes']);
    }

    public function popularArticles() {
        return Article::query()->orderByDesc('views')->withCount('comments');
    }

    public function singlePageArticle($slug)
    {
        return Article::where('slug', $slug)
            ->with(['categories', 'tags', 'images'])
            ->withCount(['likes']);
    }

    public function adminSingleArticle($article_id) {
        return Article::byId($article_id)
            ->with(['categories', 'tags', 'images'])
            ->withCount(['likes']);
    }
}
