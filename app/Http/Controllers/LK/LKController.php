<?php

namespace App\Http\Controllers\LK;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\LK\LKService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LKController extends Controller
{
    protected $lkService;
    protected $userID;

    /**
     * LKController constructor.
     * @param $lkService
     * @param $userID
     */
    public function __construct(LKService $lkService, Request $request)
    {
        $this->lkService = $lkService;
        $this->userID = (int) $request->user_id;
    }


    public function bookmarks(Request $request)
    {
        $authUser = $request->user();
        $user = $this->lkService->user($this->userID, $authUser);
        return view('lk.pages.bookmarks', ['user' => $user]);
    }

    public function articles()
    {
        $user = $this->lkService->user($this->userID)->with('articles');
        return view('lk.pages.articles', ['user' => $user]);
    }

    public function comments()
    {
        $user = $this->lkService->user($this->userID)->with('articleComments');
        return view('lk.pages.comments', ['user' => $user]);
    }

    public function questions()
    {
        $user = $this->lkService->user($this->userID)->with('questions');
        return view('lk.pages.questions', ['user' => $user]);
    }

    public function answers()
    {
        $user = $this->lkService->user($this->userID)->with('answers');
        return view('lk.pages.answers', ['user' => $user]);
    }

    public function subscribes()
    {
        $user = $this->lkService->user($this->userID)->with('subscribes');
        return view('lk.pages.subscribes', ['user' => $user]);
    }

    public function subscriptions()
    {
        $user = $this->lkService->user($this->userID)->with('subscriptions');
        return view('lk.pages.subscriptions', ['user' => $user]);
    }
}
