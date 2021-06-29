<?php

namespace App\Services\Admin;

use Exception;
use App\Models\Tag;
use App\Models\Setting;
use App\Enum\SettingsEnum;
use App\Enum\PermissionsEnum;
use App\Repositories\TagRepository;
use Illuminate\Support\Facades\Gate;

class ATagService
{

    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_tags);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $paginate = Setting::where('slug', SettingsEnum::articles_pagination)->first()->value;
            $tags = $this->tagRepository->tagList()->orderBy('created_at', 'DESC')->paginate($paginate);

            return $tags;
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
            $can = Gate::check(PermissionsEnum::manage_tags);

            if (!$can) {
                throw new Exception('Недостаточно прав для создания', 403);
            }

            $tag = new Tag();
            $tag->title = $data['title'];
            $tag->description = $data['description'];

            $success = $tag->save();

            if (!$success) {
                throw new Exception('Не удалось сохранить тег', 500);
            }

            return (object) [
                'message' => 'Тег успешно сохранена',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function edit($tag_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_tags);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $tag = $this->tagRepository->adminSingleTag($tag_id)->first();
            $tags = $this->tagRepository->tagList()->get();

            if (!$tag) {
                throw new Exception('Не найдено', 404);
            }

            return [
                'tag' => $tag,
                'allTags' => $tags,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function update(array $data, int $tag_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_tags);

            if (!$can) {
                throw new Exception('Недостаточно прав для редактирования', 403);
            }

            $tag = Tag::byId($tag_id)->first();

            if (!$tag) {
                throw new Exception('Тег не найден', 404);
            }

            $tag->title = $data['title'];
            $tag->description = $data['description'];

            $success = $tag->save();

            if (!$success) {
                throw new Exception('Не удалось редактировать тег', 500);
            }

            return (object) [
                'message' => 'Тег успешно сохранен',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function destroy($tag_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::remove_tags);

            if (!$can) {
                throw new Exception('Недостаточно прав для удаления', 403);
            }

            $tag = Tag::find($tag_id);

            if(!$tag) {
                throw new Exception('Не найдено', 404);
            }

            $success = Tag::destroy($tag_id);

            if (!$success) {
                throw new Exception('Не удалось удалить тег', 500);
            }

            return (object) [
                'message' => 'Тег успешно удален',
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
