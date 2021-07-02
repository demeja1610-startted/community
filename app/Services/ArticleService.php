<?php

namespace App\Services;

use App\Enum\AllowedFiltersEnum;
use Exception;
use App\Models\Article;
use App\Models\Setting;
use App\Enum\SettingsEnum;
use App\Repositories\ArticleRepository;

class ArticleService
{

    protected $articleRepository;
    protected $filterService;

    public function __construct(ArticleRepository $articleRepository, FilterService $filterService)
    {
        $this->articleRepository = $articleRepository;
        $this->filterService = $filterService;
    }

    public function index(array $data) {
        if (in_array($data['filter'], AllowedFiltersEnum::values())) {
            $filter['filter'] = $data['filter'];
        } else {
            $filter['filter'] = 'fresh';
        }
        $articles = $this->articleRepository->articleList();
        $paginate = Setting::where('slug', SettingsEnum::articles_pagination)->first()->value;
        return $this->filterService->sort($data, $articles)->paginate($paginate);
    }

    public function show($slug)
    {
        try {
            $article = $this->articleRepository->singlePageArticle($slug)->first();

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
