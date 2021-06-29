<?php


namespace App\Http\Controllers\LK;


class LKBookmarkController extends LKIndexController
{
    public function index()
    {
        $bookmarks = $this->user->bookmarks();
        return view('lk.pages.bookmarks', ['bookmarks' => $bookmarks]);
    }
}
