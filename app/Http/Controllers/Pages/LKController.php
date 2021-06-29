<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\LK\LKService;
use Illuminate\Http\Request;

class LKController extends Controller
{
    protected $lkService;

    /**
     * LKController constructor.
     * @param $lkService
     */
    public function __construct(LKService $lkService)
    {
        $this->lkService = $lkService;
    }

    public function bookmarks($user_id)
    {
        $user = $this->lkService->index($user_id);
        return view('lk.pages.bookmarks', ['user' => $user]);
    }
}
