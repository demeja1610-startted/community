<?php

use App\Enum\RouteNames\AdminRouteNamesEnum;
use App\Enum\RouteNames\SiteRouteNamesEnum;
use App\Events\Message;
use App\Http\Controllers\Admin\AArticleController;
use App\Http\Controllers\Admin\ACategoryController;
use App\Http\Controllers\Admin\ACommentController;
use App\Http\Controllers\Admin\AIndexController;
use App\Http\Controllers\Admin\AQuestionController;
use App\Http\Controllers\Admin\ATagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
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
Route::get('/', [IndexController::class, function() {
    return redirect()->route(SiteRouteNamesEnum::page_articles_index);
} , 'index'])->name(SiteRouteNamesEnum::page_index);

/**
 * GROUP
 */
Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'index'])->name(SiteRouteNamesEnum::page_login);

    Route::post('/', [AuthController::class, 'login'])->name(SiteRouteNamesEnum::auth_login);
});

Route::group(['prefix' => 'register'], function () {
    Route::get('/', [RegisterController::class, 'index'])->name(SiteRouteNamesEnum::page_register);

    Route::post('/', [AuthController::class, 'register'])->name(SiteRouteNamesEnum::auth_register);
});


Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name(SiteRouteNamesEnum::auth_logout);
});

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [ArticleController::class, 'index'])->name(SiteRouteNamesEnum::page_articles_index);
    Route::get('/{article:slug}', [ArticleController::class, 'show'])->name(SiteRouteNamesEnum::page_articles_single);
});

Route::group(['prefix' => 'questions'], function () {
    Route::get('/', [QuestionController::class, 'index'])->name(SiteRouteNamesEnum::page_questions_index);
    Route::get('/{question:slug}', [QuestionController::class, 'show'])->name(SiteRouteNamesEnum::page_questions_single);
});

Route::group(['prefix' => 'comments'], function () {
    Route::post('/add', [CommentController::class, 'add'])->name(SiteRouteNamesEnum::comments_add);
});

Route::get('/socket', function () {
    return view('pages.socket');
});

Route::post('/messages', function (Request $request) {
    Message::dispatch($request->input('body'));
});
