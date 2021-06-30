<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $articles = Article::get();
        return view('index', compact('articles'));
    }
}
