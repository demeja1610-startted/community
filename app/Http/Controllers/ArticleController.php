<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index() {
        $articles = Article::query()->with(['categories', 'tags', 'images'])->withCount(['comments', 'likes'])->paginate(20);

        return view('pages.articles.index', ['articles' =>  $articles]);
    }

    public function show($article_id) {
        $response = $this->articleService->show($article_id);

        if(isset($response->error)) {
            abort(404, 'Не найдено');
        }

        return view('pages.articles/single', $response);
    }
}
