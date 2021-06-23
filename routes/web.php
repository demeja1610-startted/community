<?php

use App\Enum\PermissionsEnum;
use App\Http\Controllers\Admin\AIndexController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Pages\LKController;
use App\Http\Controllers\Pages\LoginController;
use App\Http\Controllers\Pages\RegisterController;
use Illuminate\Support\Facades\Route;

$viewAdminPages = PermissionsEnum::view_admin_pages;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * GET
 */
Route::get('/', [IndexController::class, 'index'])->name('page.index');

/**
 * GROUP
 */
Route::group(['prefix' => 'login'], function() {
    Route::get('/', [LoginController::class, 'index'])->name('page.login');

    Route::post('/', [AuthController::class, 'login'])->name('auth.login');
});

Route::group(['prefix' => 'register'], function() {
    Route::get('/', [RegisterController::class, 'index'])->name('page.register');

    Route::post('/', [AuthController::class, 'register'])->name('auth.register');
});

Route::group(['middleware' => 'auth'], function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('lk', [LKController::class, 'index'])->name('page.lk.index');
});

Route::group(['prefix' => 'articles'], function() {
    Route::get('/', [ArticleController::class, 'index'])->name('page.articles.index');
    Route::get('/{article_id}', [ArticleController::class, 'show'])->name('page.articles.single');
});

Route::group(['prefix' => 'comments'], function() {
    Route::post('/add', [CommentController::class, 'add'])->name('comments.add');
});

Route::group(['prefix' => 'admin', 'middleware' => "can:$viewAdminPages"], function() {
    Route::get('/', [AIndexController::class, 'index']);
});
