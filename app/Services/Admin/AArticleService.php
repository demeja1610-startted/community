<?php

namespace App\Services\Admin;

use App\Models\Setting;
use App\Enum\SettingsEnum;
use App\Repositories\ArticleRepository;

class AArticleService
{

    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->articleList()->with('user');
        $paginate = Setting::where('slug', SettingsEnum::articles_pagination)->first()->value;

        return $articles->paginate($paginate);
    }
}
