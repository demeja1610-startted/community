<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $articles = Article::get();
        return view('index', compact('articles'));
    }
}
