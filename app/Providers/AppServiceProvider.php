<?php

namespace App\Providers;

use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', function ($view) {
            $repository = new CommentRepository();
            $comments = $repository->popularComments()->limit(5)->get();
            $view->with('popularComments', $comments);
        });
    }
}
