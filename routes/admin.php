<?php

use Illuminate\Support\Facades\Route;
use App\Enum\RouteNames\AdminRouteNamesEnum;
use App\Http\Controllers\Admin\ATagController;
use App\Http\Controllers\Admin\AIndexController;
use App\Http\Controllers\Admin\AArticleController;
use App\Http\Controllers\Admin\ACommentController;
use App\Http\Controllers\Admin\ACategoryController;
use App\Http\Controllers\Admin\AQuestionController;

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
