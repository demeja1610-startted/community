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
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

    public function create()
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_users);
            $canManageRoles = Gate::check(PermissionsEnum::manage_roles_and_permissions);

            if (!$can) {
                throw new Exception('Недостаточно прав для создания', 403);
            }

            $response = [];

            if($canManageRoles) {
                $response['roles'] = Role::all();
                $response['permissions'] =  Permission::all();
            };

            return $response;
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
            $can = Gate::check(PermissionsEnum::manage_users);
            $canManageRoles = Gate::check(PermissionsEnum::manage_roles_and_permissions);

            if (!$can) {
                throw new Exception('Недостаточно прав для создания', 403);
            }

            $user = new User();

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->about = $data['about'];
            $user->password = bcrypt($data['password']);
            $success = $user->save();

            if (!$success) {
                throw new Exception('Не удалось создать пользователя', 500);
            }

            $user->refresh();

            if($canManageRoles) {
                if(isset($data['roles'])) {
                    $user->roles()->sync($data['roles']);
                }

                if(isset($data['permissions'])) {
                    $user->permissions()->sync($data['permissions']);
                } else {
                    $user->permissions()->sync([]);
                }
            } else {
                $user->assignRole(RolesEnum::user);
            }

            return (object) [
                'message' => 'Пользователь успешно создан',
                'code' => 200,
                'data' => [
                    'user' => $user,
                ],
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function edit($user_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_users);
            $canManageRoles = Gate::check(PermissionsEnum::manage_roles_and_permissions);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $user = $this->userRepository->adminSingleUser($user_id)->first();

            if (!$user) {
                throw new Exception('Не найдено', 404);
            }

            $response = [
                'user' => $user,
            ];

            if($canManageRoles) {
                $response['roles'] = Role::all();
                $response['permissions'] =  Permission::all();
            };

            return $response;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function update(array $data, int $user_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_users);
            $canManageRoles = Gate::check(PermissionsEnum::manage_roles_and_permissions);

            if (!$can) {
                throw new Exception('Недостаточно прав для редактирования', 403);
            }

            $user = User::byId($user_id)->first();

            if (!$user) {
                throw new Exception('Пользователь не найден', 404);
            }

            $user->name = $data['name'];
            $user->about = $data['about'];
            $user->password = bcrypt($data['password']);

            $userWithSameEmail = User::byEmail($data['email'])->first();

            if(!$userWithSameEmail || ($userWithSameEmail && $user->id === $userWithSameEmail->id)) {
                $user->email = $data['email'];
            } else {
                throw new Exception('Пользователь с таким email уже существует');
            }

            if($canManageRoles) {
                if(isset($data['roles'])) {
                    $user->roles()->sync($data['roles']);
                }

                if(isset($data['permissions'])) {
                    $user->permissions()->sync($data['permissions']);
                } else {
                    $user->permissions()->sync([]);
                }
            }

            $success = $user->save();

            if (!$success) {
                throw new Exception('Не удалось редактировать пользователя', 500);
            }

            return (object) [
                'message' => 'Пользователь успешно сохранен',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

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

    public function toggleBan($user_id) {
        $can = Gate::check(PermissionsEnum::manage_users);

        if (!$can) {
            throw new Exception('Недостаточно прав для редактирования', 403);
        }

        $user = User::find($user_id);

        if(!$user) {
            throw new Exception('Не найдено', 404);
        }

        $user->is_banned = !(bool) $user->is_banned;

        $success = $user->save();

        if (!$success) {
            throw new Exception('Не удалось редактировать пользователя', 500);
        }

        return (object) [
            'message' => 'Пользователь успешно отредактирован',
            'code' => 200,
        ];
    }
}
