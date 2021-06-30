<?php


namespace App\Http\Controllers\LK;


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
     * @param $userID
     * @param LKService $lkService
     */
    public function __construct(Request $request, LKService $lkService)
    {
        $this->lkService = $lkService;
        $this->user = $this->lkService->user($request->user_id);
        if (isset($this->user->error)) {
            return redirect(404)->send();
        }
        View::share('user', $this->user);
    }
}
