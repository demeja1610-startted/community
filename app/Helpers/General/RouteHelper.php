<?php

use Illuminate\Support\Facades\Route;

class RouteHelper {
    public static function active(string $routeName): bool {
        return (strpos(Route::currentRouteName(), $routeName) == 0);
    }
}
