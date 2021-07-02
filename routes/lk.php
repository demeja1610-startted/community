<?php

use App\Enum\RouteNames\LKRouteNamesEnum;
use App\Http\Controllers\LK\LKAnswerController;
use App\Http\Controllers\LK\LKArticleController;
use App\Http\Controllers\LK\LKBookmarkController;
use App\Http\Controllers\LK\LKCommentController;
use App\Http\Controllers\LK\LKQuestionController;
use App\Http\Controllers\LK\LKSettingController;
use App\Http\Controllers\LK\LKSubscriberController;
use App\Http\Controllers\LK\LKSubscriptionController;
use Illuminate\Support\Facades\Route;

// Личный кабинет пользователя
Route::group(['prefix' => '{user_id}'], function () {
    Route::get('/bookmarks', [LKBookmarkController::class, 'index'])->name(LKRouteNamesEnum::page_index);
    Route::get('/articles', [LKArticleController::class, 'index'])->name(LKRouteNamesEnum::page_articles_index);
    Route::get('/comments', [LKCommentController::class, 'index'])->name(LKRouteNamesEnum::page_comments_index);
    Route::get('/questions', [LKQuestionController::class, 'index'])->name(LKRouteNamesEnum::page_questions_index);
    Route::get('/answers', [LKAnswerController::class, 'index'])->name(LKRouteNamesEnum::page_answers_index);
    Route::get('/subscribers', [LKSubscriberController::class, 'index'])->name(LKRouteNamesEnum::page_subscribers_index);
    Route::get('/subscriptions', [LKSubscriptionController::class, 'index'])->name(LKRouteNamesEnum::page_subscriptions_index);
});

Route::get('/settings', [LKSettingController::class, 'index'])->name(LKRouteNamesEnum::page_settings);
