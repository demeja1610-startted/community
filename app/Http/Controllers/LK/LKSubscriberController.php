<?php


namespace App\Http\Controllers\LK;


class LKSubscriberController extends LKIndexController
{
    public function index()
    {
        $subscribers = $this->user->subscribers();
        return view('lk.pages.subscribers', ['subscribers' => $subscribers]);
    }
}
