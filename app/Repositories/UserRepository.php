<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    public function lkUser($user_id)
    {
        return User::query()
            ->where('id', $user_id)
            ->withCount('bookmarks', 'articles', 'articleComments', 'questions', 'answers', 'subscribers', 'subscriptions');
    }

    public function lkAnotherUser($user_id)
    {
        return User::query()->findOrFail($user_id)
            ->withCount('articles', 'comments', 'questions', 'answers', 'subscribers');
    }
}
