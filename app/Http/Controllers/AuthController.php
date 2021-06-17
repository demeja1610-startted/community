<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
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

        return response()->json($response, $response->code ?? 200);
    }

    public function login(LoginRequest $request) {
        $credentials = $request->only(['email', 'password']);
        $response = $this->authService->login($credentials);

        return response()->json($response, $response->code ?? 200);
    }

    public function logout() {
        $response = $this->authService->logout();
        return response()->json($response, $response->code ?? 200);
    }
}
