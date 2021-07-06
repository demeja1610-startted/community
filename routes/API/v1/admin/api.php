<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Enum\RouteNames\API\v1\ApiAdminRouteNamesEnum;
use App\Http\Controllers\API\v1\Admin\ApiAGalleryController;
use App\Http\Controllers\API\v1\Admin\ApiAHelperController;

Route::group([], function() {
    Route::group(['prefix' => 'gallery'], function() {
        Route::post('/store', [ApiAGalleryController::class, 'store'])->name(ApiAdminRouteNamesEnum::gallery_store);
    });
});
