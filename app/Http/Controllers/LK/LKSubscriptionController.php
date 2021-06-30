<?php


namespace App\Http\Controllers\LK;


class LKSubscriptionController extends LKIndexController
{
    public function index()
    {
        $subscriptions = $this->user->subscriptions();
        return view('lk.pages.subscriptions', ['subscriptions' => $subscriptions]);
    }
}
