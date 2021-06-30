<?php


namespace App\Http\Controllers\LK;


use Illuminate\Http\Request;

class LKBookmarkController extends LKIndexController
{
    public function index(Request $request)
    {
        if ($request->user()->id != $this->user->id) {
            abort(403, 'У вас нет доступа к просмотру данной информации');
        }

        $bookmarks = $this->lkService->bookmarks()->get();
        return view('lk.pages.bookmarks', ['bookmarks' => $bookmarks]);
    }
}
