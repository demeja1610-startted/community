<?php

namespace App\Http\Controllers\Admin;

use App\Enum\PermissionsEnum;
use App\Http\Controllers\Controller;
use App\Services\Admin\AArticleService;

class AArticleController extends Controller
{
    protected $aarticleService;

    public function __construct(AArticleService $aarticleService)
    {
        $this->middleware('can:' . PermissionsEnum::manage_articles);

        $this->aarticleService = $aarticleService;
    }

    public function index() {
        $response = $this->aarticleService->index();

        return view('admin.articles/index', ['articles' => $response]);
    }
}
