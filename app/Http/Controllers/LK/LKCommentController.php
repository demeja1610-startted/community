<?php


namespace App\Http\Controllers\LK;


class LKCommentController extends LKIndexController
{
    public function index()
    {
        $comments = $this->user->articleComments()->paginate(20);
        return view('lk.pages.comments', ['comments' => $comments]);
    }
}
