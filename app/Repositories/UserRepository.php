<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    public function user($user_id)
    {
        return User::query()
            ->where('id', $user_id)
            ->withCount('bookmarks', 'articles', 'articleComments', 'questions', 'answers', 'subscribers', 'subscriptions');
    }

    public function adminUsersList()
    {
        return User::query()
            ->with(['roles'])
            ->withCount(['articles', 'questions', 'comments', 'voices']);
    }
}
