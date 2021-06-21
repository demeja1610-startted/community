<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [IndexController::class, 'index'])->name('page.index');

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
