<?php

namespace App\Services\Admin;

use Exception;
use App\Models\Setting;
use App\Models\Category;
use App\Enum\SettingsEnum;
use App\Enum\PermissionsEnum;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use App\Repositories\CategoryRepository;
use App\Helpers\General\CollectionHelper;

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

            $categories = $this->categoryRepository->categoryList()->orderBy('created_at', 'DESC')->get();
            $categoriesTree = $this->buildTree($categories);
            $paginate = Setting::where('slug', SettingsEnum::articles_pagination)->first()->value;

            return [
                'categories' => CollectionHelper::paginate($categoriesTree, $paginate),
                'allCategories' => $this->categoriesForSelect($categories),
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function store(array $data)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_categories);

            if (!$can) {
                throw new Exception('Недостаточно прав для создания', 403);
            }

            $category = new Category();
            $category->title = $data['title'];
            $category->description = $data['description'];

            if($data['category_id']) {
                $category->category_id = $data['category_id'];
            }

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
            $categories = $this->categoryRepository->categoryList()->get();

            if (!$category) {
                throw new Exception('Не найдено', 404);
            }

            return [
                'category' => $category,
                'allCategories' => $this->categoriesForSelect($categories, $category),
            ];
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

            if($data['category_id']) {
                $category->category_id = $data['category_id'];
            }

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

            $category = Category::find($category_id);

            if(!$category) {
                throw new Exception('Не найдено', 404);
            }

            $childsNewCategoryId = $category->category_id ?? null;
            $category->categories()->update(['category_id' => $childsNewCategoryId]);

            $success = $category->delete();

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

    public function buildTree(Collection $elements, $parentId = 0)
    {
        $elements = $elements->sortByDesc('depth');

        foreach ($elements as $key => $element) {
            $childs = $elements->filter(function($el) use ($element) {
                return $el->category_id === $element->id;
            });

            if(!$childs->isEmpty()) {
                $element->childs = $childs;

                foreach ($childs as $key => $child) {
                    $elements->forget($key);
                }
            }
        }

        return $elements;
    }

    public function categoriesForSelect($categories, Category $category = null) {
        return $categories->map(function($cat) use ($category) {
            $data = [
                'value' => $cat->id,
                'name' => $cat->title,
            ];

            if($category && $category->category_id === $cat->id) {
                $data['selected'] = true;
            }

            return $data;
        });
    }
}
