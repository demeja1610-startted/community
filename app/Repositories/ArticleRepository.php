<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function articleList() {
        return Article::query()->with(['categories', 'tags', 'images'])->withCount(['comments', 'likes']);
    }

    public function singlePageArticle($slug)
    {
        return Article::where('slug', $slug)
            ->with(['categories', 'tags', 'images'])
            ->withCount(['likes']);
    }
}
