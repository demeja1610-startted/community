<?php

use App\Enum\PermissionsEnum;
use App\Events\Message;
use App\Http\Controllers\Admin\AArticleController;
use App\Http\Controllers\Admin\AIndexController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Pages\LKController;
use App\Http\Controllers\Pages\LoginController;
use App\Http\Controllers\Pages\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('page.login');

    Route::post('/', [AuthController::class, 'login'])->name('auth.login');
});

Route::group(['prefix' => 'register'], function () {
    Route::get('/', [RegisterController::class, 'index'])->name('page.register');

    Route::post('/', [AuthController::class, 'register'])->name('auth.register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('lk', [LKController::class, 'index'])->name('page.lk.index');
});

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [ArticleController::class, 'index'])->name('page.articles.index');
    Route::get('/{article:slug}', [ArticleController::class, 'show'])->name('page.articles.single');
});

Route::group(['prefix' => 'comments'], function () {
    Route::post('/add', [CommentController::class, 'add'])->name('comments.add');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    $can = PermissionsEnum::manage_articles;

    Route::get('/', [AIndexController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => 'articles', 'middleware' => "can:$can"], function () {
        Route::get('/', [AArticleController::class, 'index'])->name('page.admin.articles.index');
    });
});


Route::get('/socket', function () {
    return view('pages.socket');
});

Route::post('/messages', function (Request $request) {
    Message::dispatch($request->input('body'));
});

