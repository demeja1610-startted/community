<?php

namespace App\Services;

use Exception;
use App\Models\Article;
use App\Models\Setting;
use App\Enum\SettingsEnum;
use App\Repositories\ArticleRepository;

class ArticleService
{

    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index() {
        $articles = $this->articleRepository->articleList();
        $paginate = Setting::where('slug', SettingsEnum::articles_pagination)->first()->value;
        return $articles->paginate($paginate);
    }

    public function show(int $article_id)
    {
        try {
            $article = $this->articleRepository->singlePageArticle($article_id)->first();

            if(!$article) {
                throw new Exception('Не найдено', 404);
            }

            $settings = Setting::query()->whereIn('slug', [SettingsEnum::comments_depth, SettingsEnum::comments_pagination])->get();
            $max_depth = $settings->filter(function($setting) {
                return $setting->slug === SettingsEnum::comments_depth;
            })->first()->value;
            $paginate = $settings->filter(function($setting) {
                return $setting->slug === SettingsEnum::comments_pagination;
            })->first()->value;

            $comments = $article->comments()->orderBy('created_at', 'DESC')->paginate($paginate);

            return [
                'article' => $article,
                'max_depth' => $max_depth ?? 5,
                'comments' => $comments,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
}
