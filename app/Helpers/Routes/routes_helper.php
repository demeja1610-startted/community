<?php
/* При обновлении роутов, необходимо набрать в консоли команлду composer dump-autoload, чтобы функции подтянули изменения */

use App\Enum\RouteNames\AdminRouteNamesEnum;
use App\Enum\RouteNames\LKRouteNamesEnum;
use App\Enum\RouteNames\SiteRouteNamesEnum;

if (!function_exists('lk_route_names')) {
    function lk_route_names()
    {
        return new LKRouteNamesEnum;
    }
}

if (!function_exists('web_route_names')) {
    function web_route_names()
    {
        return new SiteRouteNamesEnum;
    }
}

if (!function_exists('admin_route_names')) {
    function admin_route_names()
    {
        return new AdminRouteNamesEnum;
    }
}
