<?php


namespace App\Http\Controllers\LK;


class LKAnswerController extends LKIndexController
{
    public function index()
    {
        $answers = $this->user->answers()->paginate(20);
        return view('lk.pages.answers', ['answers' => $answers]);
    }
}
