<?php


namespace App\Services\LK;


use App\Repositories\LKRepository;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LKService
{
    protected $lkRepository;
    protected $user;

    /**
     * LKService constructor.
     * @param $lkRepository
     */
    public function __construct(LKRepository $lkRepository)
    {
        $this->lkRepository = $lkRepository;
    }


    public function user()
    {
        $request = request();
        $userID = $request->user_id ?? $request->user()->id;

        $user = $this->lkRepository->lkUser($userID)->first();
        if ($user === null) {
            return redirect(404)->send();
        }
        $this->user = $user;
        return $this->user;
    }

    public function bookmarks()
    {
        return $this->user->bookmarks()->with(['bookmarkable' => function ($q) {
            $q->with('images', 'user');
        }]);
    }

    public function articles()
    {
        return $this->user->articles()->with('user', 'images');
    }

    public function questions()
    {
        return $this->user->questions()->with('user', 'images');
    }

    public function answers()
    {
        return $this->user->answers()->with('user');
    }

    public function articleComments()
    {
        return $this->user->articleComments()->with('user');
    }

    public function subscribers()
    {
        return $this->user->subscribers()->with('user');
    }

    public function subscriptions()
    {
        return $this->user->subscriptions()->with('user');
    }
}
