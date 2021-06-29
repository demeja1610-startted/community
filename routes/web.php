<?php

use App\Enum\PermissionsEnum;
use App\Http\Controllers\Admin\AArticleController;
use App\Http\Controllers\Admin\ACategoryController;
use App\Http\Controllers\Admin\ACommentController;
use App\Http\Controllers\Admin\AIndexController;
use App\Http\Controllers\Admin\AQuestionController;
use App\Http\Controllers\Admin\ATagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Pages\LKController;
use App\Http\Controllers\Pages\LoginController;
use App\Http\Controllers\Pages\RegisterController;
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
    Route::get('/{article:slug}', [ArticleController::class, 'show'])->name('page.articles.single');
});

Route::group(['prefix' => 'comments'], function() {
    Route::post('/add', [CommentController::class, 'add'])->name('comments.add');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', [AIndexController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => 'articles'], function() {
        Route::get('/', [AArticleController::class, 'index'])->name('page.admin.articles.index');
        Route::get('/create', [AArticleController::class, 'create'])->name('page.admin.articles.create');
        Route::get('/{article_id}', [AArticleController::class, 'edit'])->name('page.admin.articles.edit');

        Route::put('/store', [AArticleController::class, 'store'])->name('admin.articles.store');
        Route::patch('/{article_id}', [AArticleController::class, 'update'])->name('admin.articles.update');
        Route::delete('/{article_id}', [AArticleController::class, 'destroy'])->name('admin.articles.delete');
    });

    Route::group(['prefix' => 'questions'], function() {
        Route::get('/', [AQuestionController::class, 'index'])->name('page.admin.questions.index');
        Route::get('/create', [AQuestionController::class, 'create'])->name('page.admin.questions.create');
        Route::get('/{question_id}', [AQuestionController::class, 'edit'])->name('page.admin.questions.edit');

        Route::put('/store', [AQuestionController::class, 'store'])->name('admin.questions.store');
        Route::patch('/{question_id}', [AQuestionController::class, 'update'])->name('admin.questions.update');
        Route::delete('/{question_id}', [AQuestionController::class, 'destroy'])->name('admin.questions.delete');
    });

    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', [ACategoryController::class, 'index'])->name('page.admin.categories.index');
        Route::get('/{category_id}', [ACategoryController::class, 'edit'])->name('page.admin.categories.edit');

        Route::put('/store', [ACategoryController::class, 'store'])->name('admin.categories.store');
        Route::patch('/{category_id}', [ACategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/{category_id}', [ACategoryController::class, 'destroy'])->name('admin.categories.delete');
    });

    Route::group(['prefix' => 'tags'], function() {
        Route::get('/', [ATagController::class, 'index'])->name('page.admin.tags.index');
        Route::get('/{tag_id}', [ATagController::class, 'edit'])->name('page.admin.tags.edit');

        Route::put('/store', [ATagController::class, 'store'])->name('admin.tags.store');
        Route::patch('/{tag_id}', [ATagController::class, 'update'])->name('admin.tags.update');
        Route::delete('/{tag_id}', [ATagController::class, 'destroy'])->name('admin.tags.delete');
    });

    Route::group(['prefix' => 'comments'], function() {
        Route::get('/', [ACommentController::class, 'index'])->name('page.admin.comments.index');
        Route::get('/{comment_id}', [ACommentController::class, 'edit'])->name('page.admin.comments.edit');

        Route::patch('/{comment_id}', [ACommentController::class, 'update'])->name('admin.comments.update');
        Route::patch('/{comment_id}/approve', [ACommentController::class, 'approve'])->name('admin.comments.approve');
        Route::patch('/{comment_id}/unapprove', [ACommentController::class, 'unapprove'])->name('admin.comments.unapprove');
        Route::delete('/{comment_id}', [ACommentController::class, 'destroy'])->name('admin.comments.delete');
    });
});
