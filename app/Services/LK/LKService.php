<?php


namespace App\Services\LK;


use App\Models\User;
use App\Repositories\UserRepository;

class LKService
{
    protected $userRepository;
    protected $user;

    /**
     * LKService constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function user($user_id)
    {
        $user = $this->userRepository->lkUser($user_id)->first();
        if ($user == null) {
            abort(404);
        }

        $this->user = $user;

        return $this->user;
    }

    public function bookmarks()
    {
        return $this->user->bookmarks()->with('user', 'bookmarkable');
    }

    public function articles()
    {
        return $this->user->articles()->with('user');
    }

    public function questions()
    {
        return $this->user->questions()->with('user');
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
