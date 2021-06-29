<?php

use App\Http\Controllers\Pages\LKController;
use Illuminate\Support\Facades\Route;

// Личный кабинет пользователя
Route::group(['middleware' => 'auth', 'prefix' => '{user_id}'], function () {
    Route::get('/bookmarks', [LKController::class, 'bookmarks'])->name('user.bookmarks');
    Route::get('/articles', [LKController::class, 'articles'])->name('user.articles');
    Route::get('/comments', [LKController::class, 'comments'])->name('user.comments');
    Route::get('/questions', [LKController::class, 'questions'])->name('user.questions');
    Route::get('/answers', [LKController::class, 'answers'])->name('user.answers');
    Route::get('/subscribes', [LKController::class, 'subscribes'])->name('user.subscribes');
});
