<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request) {
        /*if (!empty($request->filled('filter'))) {
            dd($request->input());
        }*/
        $data = [
            'filter' => $request->input('filter') ? $request->input('filter') : 'default'
        ];
        $response = $this->articleService->index($data);

        return view('pages.articles.index', ['articles' =>  $response]);
    }

    public function show($slug) {
        $response = $this->articleService->show($slug);

        if(isset($response->error)) {
            abort(404, 'Не найдено');
        }

        return view('pages.articles/single', $response);
    }
}
