<?php

namespace App\Services;

use Exception;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    public function register(array $credentials)
    {
        try {
            $user = new User($credentials);
            $user->password = Hash::make($credentials['password']);

            $success = $user->save();

            if(!$success) {
                throw new Exception('Не удалось зарегистрироваться', 500);
            }

            return UserResource::make($user);
        } catch (Exception $ex) {
            return (object) [
                'error' => $ex->getMessage(),
                'code' => $ex->getCode(),
            ];
        }
    }

    public function login(array $credentials)
    {
        try {
            $canLogin = Auth::attempt($credentials);

            if (!$canLogin) {
                throw new Exception('Неверный email или пароль', 401);
            }

            $user = Auth::user();
            $user->createToken('login_token');

            return $canLogin;
        } catch (Exception $ex) {
            return (object) [
                'error' => $ex->getMessage(),
                'code' => $ex->getCode(),
            ];
        }
    }

    public function logout()
    {
        try {
            $user = Auth::user();
            $user->tokens()->where('name', 'login_token')->delete();

            $success = Auth::logout();

            if (!$success) {
                throw new Exception('Не удалось выйти', 500);
            }

            return $success;
        } catch (Exception $ex) {
            return (object) [
                'error' => $ex->getMessage(),
                'code' => $ex->getCode(),
            ];
        }
    }
}
