<?php
/* При обновлении роутов, необходимо набрать в консоли команлду composer dump-autoload, чтобы функции подтянули изменения */

use App\Enum\RouteNames\AdminRouteNamesEnum;
use App\Enum\RouteNames\API\v1\ApiAdminRouteNamesEnum;
use App\Enum\RouteNames\LKRouteNamesEnum;
use App\Enum\RouteNames\SiteRouteNamesEnum;

if (!function_exists('lkRouterNames')) {
    function lkRouterNames()
    {
        return new LKRouteNamesEnum;
    }
}

if (!function_exists('webRouterNames')) {
    function webRouterNames()
    {
        return new SiteRouteNamesEnum;
    }
}

if (!function_exists('AdminRouterNames')) {
    function AdminRouterNames()
    {
        return new AdminRouteNamesEnum;
    }
}

if (!function_exists('apiAdminRouterNames')) {
    function apiAdminRouterNames()
    {
        return new ApiAdminRouteNamesEnum;
    }
}
