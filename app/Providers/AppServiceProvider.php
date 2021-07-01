<?php

namespace App\Providers;

use App\Helpers\General\CommentableRouteHelper;
use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Models\Comment;
use App\Repositories\LKRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
        Blade::directive('routeActive', function ($route) {
            return "<?php echo Route::currentRouteNamed($route) ? \"active\" : '' ?>";
        });

        Blade::if('currentRoute', function ($route) {
            return Route::currentRouteNamed($route);
        });

        Blade::directive('showPopularComments', function () {
            $comments = Comment::query()->with('user')->get();
            return view('components.blabla', ['comments' => $comments]);
        });

        View::composer('layouts.app', function ($view) {
            $repository = new CommentRepository();
            $comments = $repository->popularComments()->limit(5)->get();
            $comments->map(function($comment) {
                $url = CommentableRouteHelper::getUrl($comment);

                if(!isset($url->error)) {
                    $comment->commentableUrl = $url;
                    return $comment;
                }
            });
            $view->with('popularComments', $comments);
        });
    }
}
