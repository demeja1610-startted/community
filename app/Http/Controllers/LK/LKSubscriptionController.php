<?php


namespace App\Http\Controllers\LK;


class LKSubscriptionController extends LKIndexController
{
    public function index()
    {
        $subscriptions = $this->user->subscriptions()->paginate(20);
        return view('lk.pages.subscriptions', ['subscriptions' => $subscriptions]);
    }
}
