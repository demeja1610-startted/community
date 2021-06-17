<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

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
        return redirect()->route('page.lk.index');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->only(['email', 'password']);
        $response = $this->authService->login($credentials);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        session()->flash('success', 'Вы успешно авторизованы');
        return redirect()->route('page.lk.index');
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
