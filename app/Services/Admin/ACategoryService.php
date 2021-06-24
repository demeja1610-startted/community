<?php

namespace App\Services\Admin;

use App\Enum\PermissionsEnum;
use Exception;
use App\Models\Setting;
use App\Enum\SettingsEnum;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Gate;

class ACategoryService
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_categories);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $categories = $this->categoryRepository->categoryList()->orderBy('created_at', 'DESC');
            $paginate = Setting::where('slug', SettingsEnum::articles_pagination)->first()->value;

            return $categories->paginate($paginate);
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function store(array $data) {
        try {
            $can = Gate::check(PermissionsEnum::manage_categories);

            if (!$can) {
                throw new Exception('Недостаточно прав для создания', 403);
            }

            $category = new Category();
            $category->title = $data['title'];
            $category->description = $data['description'];

            $success = $category->save();

            if (!$success) {
                throw new Exception('Не удалось сохранить категорию', 500);
            }
            $category->refresh();

            return (object) [
                'message' => 'Категория успешно сохранена',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function edit($category_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_categories);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $category = $this->categoryRepository->adminSingleCategory($category_id)->first();

            if (!$category) {
                throw new Exception('Не найдено', 404);
            }

            return $category;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function update(array $data, int $category_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_categories);

            if (!$can) {
                throw new Exception('Недостаточно прав для редактирования', 403);
            }

            $category = Category::byId($category_id)->first();

            if (!$category) {
                throw new Exception('Категория не найдена', 404);
            }

            $category->title = $data['title'];
            $category->description = $data['description'];

            $success = $category->save();

            if (!$success) {
                throw new Exception('Не удалось редактировать категорию', 500);
            }

            return (object) [
                'message' => 'Категория успешно сохранена',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function destroy($category_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::remove_articles);

            if (!$can) {
                throw new Exception('Недостаточно прав для удаления', 403);
            }

            $success = Category::destroy($category_id);

            if (!$success) {
                throw new Exception('Не удалось удалить категорию', 500);
            }

            return (object) [
                'message' => 'Категория успешно удалена',
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
