<?php


namespace App\Http\Controllers\LK;


class LKBookmarkController extends LKIndexController
{
    public function index()
    {
        $bookmarks = $this->lkService->bookmarks()->get();
        return view('lk.pages.bookmarks', ['bookmarks' => $bookmarks]);
    }
}
