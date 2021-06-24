<?php

namespace App\Services\Admin;

use App\Enum\PermissionsEnum;
use Exception;
use App\Models\Setting;
use App\Enum\SettingsEnum;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Gate;

class AArticleService
{

    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_articles);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $articles = $this->articleRepository->articleList()->with('user')->orderBy('created_at', 'DESC');
            $paginate = Setting::where('slug', SettingsEnum::articles_pagination)->first()->value;

            return $articles->paginate($paginate);
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function create()
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_articles);

            if (!$can) {
                throw new Exception('Недостаточно прав для создания', 403);
            }

            return 1;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function store(array $data) {
        try {
            $can = Gate::check(PermissionsEnum::manage_articles);

            if (!$can) {
                throw new Exception('Недостаточно прав для создания', 403);
            }

            $article = new Article();
            $article->title = $data['title'];
            $article->description = $data['description'];
            $article->user_id = $data['user_id'];

            $success = $article->save();

            if (!$success) {
                throw new Exception('Не удалось сохранить статью', 500);
            }
            $article->refresh();

            return (object) [
                'message' => 'Статья успешно сохранена',
                'code' => 200,
                'data' => [
                    'article_id' => $article->id,
                ],
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function edit($article_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_articles);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $article = $this->articleRepository->adminSingleArticle($article_id)->first();

            if (!$article) {
                throw new Exception('Не найдено', 404);
            }

            return $article;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function update(array $data, int $article_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_articles);

            if (!$can) {
                throw new Exception('Недостаточно прав для редактирования', 403);
            }

            $article = Article::byId($article_id)->first();

            if (!$article) {
                throw new Exception('Статья не найдена', 404);
            }

            $article->title = $data['title'];
            $article->description = $data['description'];

            $success = $article->save();

            if (!$success) {
                throw new Exception('Не удалось редактировать статью', 500);
            }

            return (object) [
                'message' => 'Статья успешно сохранена',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function destroy($article_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::remove_articles);

            if (!$can) {
                throw new Exception('Недостаточно прав для удаления', 403);
            }

            $success = Article::destroy($article_id);

            if (!$success) {
                throw new Exception('Не удалось удалить статью', 500);
            }

            return (object) [
                'message' => 'Статья успешно удалена',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
}
