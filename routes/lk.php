<?php

use App\Http\Controllers\LK\LKAnswerController;
use App\Http\Controllers\LK\LKArticleController;
use App\Http\Controllers\LK\LKBookmarkController;
use App\Http\Controllers\LK\LKCommentController;
use App\Http\Controllers\LK\LKQuestionController;
use App\Http\Controllers\LK\LKSubscriberController;
use App\Http\Controllers\LK\LKSubscriptionController;
use Illuminate\Support\Facades\Route;

// Личный кабинет пользователя
Route::group(['prefix' => '{user_id}'], function () {
    Route::get('/bookmarks', [LKBookmarkController::class, 'index'])->name('user.bookmarks');
    Route::get('/articles', [LKArticleController::class, 'index'])->name('user.articles');
    Route::get('/comments', [LKCommentController::class, 'index'])->name('user.comments');
    Route::get('/questions', [LKQuestionController::class, 'index'])->name('user.questions');
    Route::get('/answers', [LKAnswerController::class, 'index'])->name('user.answers');
    Route::get('/subscribers', [LKSubscriberController::class, 'index'])->name('user.subscribers');
    Route::get('/subscriptions', [LKSubscriptionController::class, 'index'])->name('user.subscriptions');
});
