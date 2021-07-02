<?php

namespace App\Providers;

use App\Helpers\General\CommentableRouteHelper;
use App\Helpers\General\ModelRouteHelper;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Models\Comment;
use App\Repositories\UserRepository;
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
            $commentRepository = new CommentRepository();
            $articleRepository = new ArticleRepository();
            $comments = $commentRepository->popularComments()->limit(5)->get();
            $popularArticles = $articleRepository->popularArticles()->limit(4)->get();
            $comments->map(function($comment) {
                $routeName = ModelRouteHelper::getPageRouteName($comment->commentable, 'single');

                if($routeName) {
                    $comment->commentableRouteName = $routeName;
                    return $comment;
                }
            });
            $view->with('popularComments', $comments)->with('popularArticles', $popularArticles);
        });
    }
}
