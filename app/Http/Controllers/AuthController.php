<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enum\PermissionsEnum;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request) {
        $credentials = $request->only(['email', 'password']);
        $response = $this->authService->register($credentials);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        $loggedIn = $this->authService->login($credentials);

        if(isset($loggedIn->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        session()->flash('success', 'Вы успешно зарегистрированы');
        return redirect()->route('user.bookmarks', ['user_id' => $request->user()->id]);
    }

    public function login(LoginRequest $request) {
        $credentials = $request->only(['email', 'password']);
        $response = $this->authService->login($credentials);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        if(Gate::check(PermissionsEnum::view_admin_pages)) {
            return redirect()->route('page.admin.index');
        } else {
            session()->flash('success', 'Вы успешно авторизованы');
            return redirect()->route('user.bookmarks', ['user_id' => $request->user()->id]);
        }
    }

    public function logout(Request $request) {
        $response = $this->authService->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        session()->flash('success', 'Вы успешно вышли');
        return redirect()->route('page.index');
    }
}
