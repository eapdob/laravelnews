<?php

use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthenticationController::class, 'handleLogin'])->name('handle-login');
    Route::post('logout', [AdminAuthenticationController::class, 'logout'])->name('logout');
    Route::get('forgot-password', [AdminAuthenticationController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('forgot-password', [AdminAuthenticationController::class, 'sendResetLink'])->name('forgot-password.send');
    Route::get('reset-password/{token}', [AdminAuthenticationController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [AdminAuthenticationController::class, 'handleResetPassword'])->name('reset-password.send');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('profile-password-update/{id}', [ProfileController::class, 'passwordUpdate'])->name('profile-password-update');
    Route::resource('profile', ProfileController::class);
    Route::resource('language', LanguageController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('news', NewsController::class);
    Route::get('fetch-news-category', [NewsController::class, 'fetchCategory'])->name('fetch-news-category');
});
