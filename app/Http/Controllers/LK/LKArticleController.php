<?php


namespace App\Http\Controllers\LK;


class LKArticleController extends LKIndexController
{
    public function index()
    {
        $articles = $this->user->articles();
        return view('lk.pages.articles', ['articles' => $articles]);
    }
}
