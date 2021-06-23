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
        $response = $this->articleService->index();

        return view('pages.articles.index', ['articles' =>  $response]);
    }

    public function show($article_id) {
        $response = $this->articleService->show($article_id);

        if(isset($response->error)) {
            abort(404, 'Не найдено');
        }

        return view('pages.articles/single', $response);
    }
}
