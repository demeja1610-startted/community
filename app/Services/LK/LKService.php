<?php


namespace App\Services\LK;


use App\Models\User;
use App\Repositories\UserRepository;
use Error;
use Exception;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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
        try {
            $user = $this->userRepository->lkUser($user_id)->first();
            if ($user === null) {
                throw new Exception('Ошибка 404', 404);
            }
            $this->user = $user;
            return $this->user;
        } catch (Exception $e) {
            return (object)[
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function bookmarks()
    {
        return $this->user->bookmarks()->with(['user', 'bookmarkable' => function ($q) {
            $q->with('images');
        }]);
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
