<?php

use App\Enum\RouteNames\AdminRouteNamesEnum;
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
});

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [ArticleController::class, 'index'])->name('page.articles.index');
    Route::get('/{article:slug}', [ArticleController::class, 'show'])->name('page.articles.single');
});

Route::group(['prefix' => 'questions'], function () {
    Route::get('/', [QuestionController::class, 'index'])->name('page.questions.index');
    Route::get('/{question:slug}', [QuestionController::class, 'show'])->name('page.questions.single');
});

Route::group(['prefix' => 'comments'], function () {
    Route::post('/add', [CommentController::class, 'add'])->name('comments.add');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [AIndexController::class, 'index'])->name(AdminRouteNamesEnum::page_index);

    Route::group(['prefix' => 'articles'], function () {
        Route::get('/', [AArticleController::class, 'index'])->name(AdminRouteNamesEnum::page_articles_index);
        Route::get('/create', [AArticleController::class, 'create'])->name(AdminRouteNamesEnum::page_articles_create);
        Route::get('/{article_id}', [AArticleController::class, 'edit'])->name(AdminRouteNamesEnum::page_articles_edit);

        Route::put('/store', [AArticleController::class, 'store'])->name(AdminRouteNamesEnum::page_articles_store);
        Route::patch('/{article_id}', [AArticleController::class, 'update'])->name(AdminRouteNamesEnum::page_articles_update);
        Route::delete('/{article_id}', [AArticleController::class, 'destroy'])->name(AdminRouteNamesEnum::page_articles_destroy);
    });

    Route::group(['prefix' => 'questions'], function () {
        Route::get('/', [AQuestionController::class, 'index'])->name(AdminRouteNamesEnum::page_questions_index);
        Route::get('/create', [AQuestionController::class, 'create'])->name(AdminRouteNamesEnum::page_questions_create);
        Route::get('/{question_id}', [AQuestionController::class, 'edit'])->name(AdminRouteNamesEnum::page_questions_edit);

        Route::put('/store', [AQuestionController::class, 'store'])->name(AdminRouteNamesEnum::page_questions_store);
        Route::patch('/{question_id}', [AQuestionController::class, 'update'])->name(AdminRouteNamesEnum::page_questions_update);
        Route::delete('/{question_id}', [AQuestionController::class, 'destroy'])->name(AdminRouteNamesEnum::page_questions_destroy);
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [ACategoryController::class, 'index'])->name(AdminRouteNamesEnum::page_categories_index);
        Route::get('/{category_id}', [ACategoryController::class, 'edit'])->name(AdminRouteNamesEnum::page_categories_edit);

        Route::put('/store', [ACategoryController::class, 'store'])->name(AdminRouteNamesEnum::page_categories_store);
        Route::patch('/{category_id}', [ACategoryController::class, 'update'])->name(AdminRouteNamesEnum::page_categories_update);
        Route::delete('/{category_id}', [ACategoryController::class, 'destroy'])->name(AdminRouteNamesEnum::page_categories_destroy);
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', [ATagController::class, 'index'])->name(AdminRouteNamesEnum::page_tags_index);
        Route::get('/{tag_id}', [ATagController::class, 'edit'])->name(AdminRouteNamesEnum::page_tags_edit);

        Route::put('/store', [ATagController::class, 'store'])->name(AdminRouteNamesEnum::page_tags_store);
        Route::patch('/{tag_id}', [ATagController::class, 'update'])->name(AdminRouteNamesEnum::page_tags_update);
        Route::delete('/{tag_id}', [ATagController::class, 'destroy'])->name(AdminRouteNamesEnum::page_tags_destroy);
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', [ACommentController::class, 'index'])->name(AdminRouteNamesEnum::page_comments_index);
        Route::get('/{comment_id}', [ACommentController::class, 'edit'])->name(AdminRouteNamesEnum::page_comments_edit);

        Route::patch('/{comment_id}', [ACommentController::class, 'update'])->name(AdminRouteNamesEnum::page_comments_update);
        Route::patch('/{comment_id}/approve', [ACommentController::class, 'approve'])->name(AdminRouteNamesEnum::page_comments_approve);
        Route::patch('/{comment_id}/unapprove', [ACommentController::class, 'unapprove'])->name(AdminRouteNamesEnum::page_comments_unapprove);
        Route::delete('/{comment_id}', [ACommentController::class, 'destroy'])->name(AdminRouteNamesEnum::page_comments_destroy);
    });
});


Route::get('/socket', function () {
    return view('pages.socket');
});

Route::post('/messages', function (Request $request) {
    Message::dispatch($request->input('body'));
});

