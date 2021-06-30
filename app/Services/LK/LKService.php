<?php


namespace App\Services\LK;


use App\Models\User;
use App\Repositories\UserRepository;

class LKService
{
    protected $userRepository;

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

        return $user;
    }
}
