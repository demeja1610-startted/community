<?php
namespace App\Helpers\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class ModelRouteHelper {

    protected static function getModelTable(Model $model) {
        return $model->getTable();
    }

    public static function getPageRouteName(Model $model, $method = 'index', $prefix = false) {
        $tableName = self::getModelTable($model);
        $routeName = 'page.';

        if(!empty($prefix)) {
            $routeName .= $prefix . '.';
        }

        $routeName .= $tableName . '.' . $method;
        $routeExists = Route::has($routeName);

        return $routeExists ? $routeName : false;
    }

    public static function getRouteName(Model $model, $method, $prefix = false) {
        $tableName = self::getModelTable($model);
        $routeName = '';

        if(!empty($prefix)) {
            $routeName .= $prefix . '.';
        }

        $routeName .= $tableName . '.' . $method;
        $routeExists = Route::has($routeName);

        return $routeExists ? $routeName : false;
    }
}

