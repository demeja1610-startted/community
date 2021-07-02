<?php

namespace App\Services\Admin;

use Exception;
use App\Models\Setting;
use App\Enum\SettingsEnum;
use App\Enum\PermissionsEnum;
use App\Enum\RolesEnum;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AUserService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_users);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $paginate = Setting::where('slug', SettingsEnum::articles_pagination)->first()->value;
            $users = $this->userRepository->adminUsersList()->orderBy('created_at', 'DESC')->paginate($paginate);

            return [
                'users' => $users,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    // public function store(array $data)
    // {
    //     try {
    //         $can = Gate::check(PermissionsEnum::manage_users);

    //         if (!$can) {
    //             throw new Exception('Недостаточно прав для создания', 403);
    //         }

    //         $tag = new Tag();
    //         $tag->title = $data['title'];
    //         $tag->description = $data['description'];

    //         $success = $tag->save();

    //         if (!$success) {
    //             throw new Exception('Не удалось сохранить тег', 500);
    //         }

    //         return (object) [
    //             'message' => 'Тег успешно сохранена',
    //             'code' => 200,
    //         ];
    //     } catch (Exception $e) {
    //         return (object) [
    //             'error' => $e->getMessage(),
    //             'code' => $e->getCode(),
    //         ];
    //     }
    // }

    // public function edit($user_id)
    // {
    //     try {
    //         $can = Gate::check(PermissionsEnum::manage_users);

    //         if (!$can) {
    //             throw new Exception('Недостаточно прав для просмотра', 403);
    //         }

    //         $tag = $this->tagRepository->adminSingleTag($user_id)->first();
    //         $tags = $this->tagRepository->tagList()->get();

    //         if (!$tag) {
    //             throw new Exception('Не найдено', 404);
    //         }

    //         return [
    //             'tag' => $tag,
    //             'allTags' => $tags,
    //         ];
    //     } catch (Exception $e) {
    //         return (object) [
    //             'error' => $e->getMessage(),
    //             'code' => $e->getCode(),
    //         ];
    //     }
    // }

    // public function update(array $data, int $user_id)
    // {
    //     try {
    //         $can = Gate::check(PermissionsEnum::manage_users);

    //         if (!$can) {
    //             throw new Exception('Недостаточно прав для редактирования', 403);
    //         }

    //         $tag = Tag::byId($user_id)->first();

    //         if (!$tag) {
    //             throw new Exception('Тег не найден', 404);
    //         }

    //         $tag->title = $data['title'];
    //         $tag->description = $data['description'];

    //         $success = $tag->save();

    //         if (!$success) {
    //             throw new Exception('Не удалось редактировать тег', 500);
    //         }

    //         return (object) [
    //             'message' => 'Тег успешно сохранен',
    //             'code' => 200,
    //         ];
    //     } catch (Exception $e) {
    //         return (object) [
    //             'error' => $e->getMessage(),
    //             'code' => $e->getCode(),
    //         ];
    //     }
    // }

    public function destroy($user_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::remove_users);

            if (!$can) {
                throw new Exception('Недостаточно прав для удаления', 403);
            }

            $user = User::find($user_id);

            if(!$user) {
                throw new Exception('Не найдено', 404);
            }

            if(Auth::check() && Auth::id() === $user->id) {
                throw new Exception('Невозможно удалить текушего пользователя', 500);
            }


            $admin = User::query()->whereHas("roles", function($q) {
                $q->where('name', RolesEnum::editor);
            })->first('id');

            $success = $user->delete();

            if (!$success) {
                throw new Exception('Не удалось удалить пользователя', 500);
            } else {
                $user->articles()->update(['user_id' => $admin->id]);
                $user->questions()->update(['user_id' => $admin->id]);
            }

            return (object) [
                'message' => 'Пользователь успешно удален',
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
