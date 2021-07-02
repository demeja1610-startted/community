<?php


namespace App\Http\Controllers\LK;


use App\Enum\RouteNames\SiteRouteNamesEnum;
use App\Http\Controllers\Controller;
use App\Services\LK\LKService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LKIndexController extends Controller
{
    protected $lkService;
    protected $user;

    /**
     * LKIndexController constructor.
     * @param LKService $lkService
     */
    public function __construct(LKService $lkService)
    {
        $this->lkService = $lkService;
        $this->user = $this->lkService->user();
        View::share('user', $this->user);
    }

}
