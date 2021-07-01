<?php

namespace App\Http\Controllers\Pages;

use App\Enum\RouteNames\LKRouteNamesEnum;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index(Request $request)
    {
        $user = $request->user();

        if ($user) {
            return redirect()->route(LKRouteNamesEnum::page_index, ['user_id' => $user->id]);
        }

        return view('pages.login');
    }
}
