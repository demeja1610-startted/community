<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('lk.pages.page-*', function ($view) {
            $currentUserID = request()->user_id ?? request()->user()->id;
            $userData = (new UserRepository())->user($currentUserID)->first();
            $view->with('user', $userData);
        });

        Blade::if('currentUser', function () {
            $userID = request()->user_id;
            $authUserID = request()->user()->id;
            return $userID == $authUserID || !$userID;
        });
    }
}
