<?php

use Illuminate\Support\Facades\Route;
use App\Enum\RouteNames\AdminRouteNamesEnum;
use App\Http\Controllers\Admin\ATagController;
use App\Http\Controllers\Admin\AUserController;
use App\Http\Controllers\Admin\AIndexController;
use App\Http\Controllers\Admin\AArticleController;
use App\Http\Controllers\Admin\ACommentController;
use App\Http\Controllers\Admin\AGalleryController;
use App\Http\Controllers\Admin\ACategoryController;
use App\Http\Controllers\Admin\AQuestionController;

Route::get('/', [AIndexController::class, 'index'])->name(AdminRouteNamesEnum::page_index);

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [AArticleController::class, 'index'])->name(AdminRouteNamesEnum::page_articles_index);
    Route::get('/create', [AArticleController::class, 'create'])->name(AdminRouteNamesEnum::page_articles_create);
    Route::get('/{article_id}', [AArticleController::class, 'edit'])->name(AdminRouteNamesEnum::page_articles_edit);

    Route::put('/store', [AArticleController::class, 'store'])->name(AdminRouteNamesEnum::articles_store);
    Route::patch('/{article_id}', [AArticleController::class, 'update'])->name(AdminRouteNamesEnum::articles_update);
    Route::delete('/{article_id}', [AArticleController::class, 'destroy'])->name(AdminRouteNamesEnum::articles_destroy);
});

Route::group(['prefix' => 'questions'], function () {
    Route::get('/', [AQuestionController::class, 'index'])->name(AdminRouteNamesEnum::page_questions_index);
    Route::get('/create', [AQuestionController::class, 'create'])->name(AdminRouteNamesEnum::page_questions_create);
    Route::get('/{question_id}', [AQuestionController::class, 'edit'])->name(AdminRouteNamesEnum::page_questions_edit);

    Route::put('/store', [AQuestionController::class, 'store'])->name(AdminRouteNamesEnum::questions_store);
    Route::patch('/{question_id}', [AQuestionController::class, 'update'])->name(AdminRouteNamesEnum::questions_update);
    Route::delete('/{question_id}', [AQuestionController::class, 'destroy'])->name(AdminRouteNamesEnum::questions_destroy);
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [ACategoryController::class, 'index'])->name(AdminRouteNamesEnum::page_categories_index);
    Route::get('/{category_id}', [ACategoryController::class, 'edit'])->name(AdminRouteNamesEnum::page_categories_edit);

    Route::put('/store', [ACategoryController::class, 'store'])->name(AdminRouteNamesEnum::сategories_store);
    Route::patch('/{category_id}', [ACategoryController::class, 'update'])->name(AdminRouteNamesEnum::categories_update);
    Route::delete('/{category_id}', [ACategoryController::class, 'destroy'])->name(AdminRouteNamesEnum::categories_destroy);
});

Route::group(['prefix' => 'tags'], function () {
    Route::get('/', [ATagController::class, 'index'])->name(AdminRouteNamesEnum::page_tags_index);
    Route::get('/{tag_id}', [ATagController::class, 'edit'])->name(AdminRouteNamesEnum::page_tags_edit);

    Route::put('/store', [ATagController::class, 'store'])->name(AdminRouteNamesEnum::tags_store);
    Route::patch('/{tag_id}', [ATagController::class, 'update'])->name(AdminRouteNamesEnum::tags_update);
    Route::delete('/{tag_id}', [ATagController::class, 'destroy'])->name(AdminRouteNamesEnum::tags_destroy);
});

Route::group(['prefix' => 'comments'], function () {
    Route::get('/', [ACommentController::class, 'index'])->name(AdminRouteNamesEnum::page_comments_index);
    Route::get('/{comment_id}', [ACommentController::class, 'edit'])->name(AdminRouteNamesEnum::page_comments_edit);

    Route::patch('/{comment_id}', [ACommentController::class, 'update'])->name(AdminRouteNamesEnum::сomments_update);
    Route::patch('/{comment_id}/toggle-approve', [ACommentController::class, 'toggleApprove'])->name(AdminRouteNamesEnum::comments_toggle_approve);
    Route::delete('/{comment_id}', [ACommentController::class, 'destroy'])->name(AdminRouteNamesEnum::comments_destroy);
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [AUserController::class, 'index'])->name(AdminRouteNamesEnum::page_users_index);
    Route::get('/create', [AUserController::class, 'create'])->name(AdminRouteNamesEnum::page_users_create);
    Route::get('/{user_id}', [AUserController::class, 'edit'])->name(AdminRouteNamesEnum::page_users_edit);

    Route::put('/store', [AUserController::class, 'store'])->name(AdminRouteNamesEnum::users_store);
    Route::patch('/{user_id}', [AUserController::class, 'update'])->name(AdminRouteNamesEnum::users_update);
    Route::delete('/{user_id}', [AUserController::class, 'destroy'])->name(AdminRouteNamesEnum::users_destroy);
    Route::patch('/{user_id}/toggle-ban/', [AUserController::class, 'toggleBan'])->name(AdminRouteNamesEnum::users_toggle_ban);
});

Route::group(['prefix' => 'gallery'], function () {
    Route::get('/', [AGalleryController::class, 'index'])->name(AdminRouteNamesEnum::page_gallery_index);
    // Route::get('/create', [AUserController::class, 'create'])->name(AdminRouteNamesEnum::page_users_create);
    // Route::get('/{user_id}', [AUserController::class, 'edit'])->name(AdminRouteNamesEnum::page_users_edit);

    // Route::patch('/{user_id}', [AUserController::class, 'update'])->name(AdminRouteNamesEnum::users_update);
    // Route::delete('/{user_id}', [AUserController::class, 'destroy'])->name(AdminRouteNamesEnum::users_destroy);
    // Route::patch('/{user_id}/toggle-ban/', [AUserController::class, 'toggleBan'])->name(AdminRouteNamesEnum::users_toggle_ban);
});
