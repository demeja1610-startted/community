<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::query()->with(['categories', 'tags', 'images'])->withCount(['comments', 'likes'])->paginate(20);

        return view('pages.articles.index', ['articles' =>  $articles]);
    }

    public function show($article_id) {
        $article = Article::byId($article_id)
            ->with(['categories', 'tags', 'images'])
            ->withCount(['comments', 'likes'])
            ->first();

        return view('pages.articles/single', ['article' => $article]);
    }
}
