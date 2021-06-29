<?php

namespace App\Providers;

use App\Models\Comment;
use Illuminate\Support\Facades\Blade;
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
    }
}
