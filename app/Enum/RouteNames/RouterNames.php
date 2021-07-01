<?php


namespace App\Enum\RouteNames;


class RouterNames
{
    public static function lk()
    {
        return new LKRouteNamesEnum;
    }

    public static function web()
    {
        return new AdminRouteNamesEnum;
    }

    public static function admin()
    {
        return new SiteRouteNamesEnum;
    }
}
