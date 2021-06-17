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
        // dd($credentials);
        try {
            $canLogin = Auth::attempt($credentials);

            if (!$canLogin) {
                throw new Exception('Неверный email или пароль', 401);
            }

            $user = User::where('email', $credentials['email'])->first();

            $token = $user->createToken('auth-token');

            $user = UserResource::make($user)->addToken($token->plainTextToken);

            return $user;
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
            $success = auth()->user()->tokens()->delete();

            if (!$success) {
                throw new Exception('Не удалось выйти', 500);
            }

            return (object) [
                'message' => 'Вы успешно вышли',
                'code' => 200,
            ];
        } catch (Exception $ex) {
            return (object) [
                'error' => $ex->getMessage(),
                'code' => $ex->getCode(),
            ];
        }
    }
}
