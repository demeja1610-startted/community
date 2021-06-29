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

    public function user($user_id, $authUser = null)
    {
        if ($authUser !== null && $user_id !== $authUser->id) {
            abort(404);
        }
        return $this->userRepository->lkUser($user_id)->first();
    }
}
