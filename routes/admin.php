<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FooterGridOneController;
use App\Http\Controllers\Admin\FooterGridThreeController;
use App\Http\Controllers\Admin\FooterGridTwoController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\HomeSectionSettingController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialCountController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthenticationController::class, 'handleLogin'])->name('handle-login');
    Route::post('logout', [AdminAuthenticationController::class, 'logout'])->name('logout');
    Route::get('forgot-password', [AdminAuthenticationController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('forgot-password', [AdminAuthenticationController::class, 'sendResetLink'])->name(
        'forgot-password.send'
    );
    Route::get('reset-password/{token}', [AdminAuthenticationController::class, 'resetPassword'])->name(
        'reset-password'
    );
    Route::post('reset-password', [AdminAuthenticationController::class, 'handleResetPassword'])->name(
        'reset-password.send'
    );
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('profile-password-update/{id}', [ProfileController::class, 'passwordUpdate'])->name(
        'profile-password-update'
    );
    Route::resource('profile', ProfileController::class);
    Route::resource('language', LanguageController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('news', NewsController::class);
    Route::get('fetch-news-category', [NewsController::class, 'fetchCategory'])->name('fetch-news-category');
    Route::get('toggle-news-status', [NewsController::class, 'toggleNewsStatus'])->name('toggle-news-status');
    Route::get('news-copy/{id}', [NewsController::class, 'copyNews'])->name('news-copy');
    Route::get('pending-news', [NewsController::class, 'pendingNews'])->name('pending.news');
    Route::put('approve-news', [NewsController::class, 'approveNews'])->name('approve.news');
    Route::get('home-section-setting', [HomeSectionSettingController::class, 'index'])->name('home-section-setting');
    Route::put('home-section-setting', [HomeSectionSettingController::class, 'update'])->name('home-section-setting');
    Route::resource('social-count', SocialCountController::class);
    Route::resource('ad', AdController::class);
    Route::resource('subscriber', SubscriberController::class);
    Route::resource('social-link', SocialLinkController::class);
    Route::resource('footer-info', FooterInfoController::class);
    Route::resource('footer-grid-one', FooterGridOneController::class);
    Route::post('footer-grid-one-title', [FooterGridOneController::class, 'handleTitle'])->name('footer-grid-one-title');
    Route::resource('footer-grid-two', FooterGridTwoController::class);
    Route::post('footer-grid-two-title', [FooterGridTwoController::class, 'handleTitle'])->name('footer-grid-two-title');
    Route::resource('footer-grid-three', FooterGridThreeController::class);
    Route::post('footer-grid-three-title', [FooterGridThreeController::class, 'handleTitle'])->name('footer-grid-three-title');
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::put('contact', [ContactController::class, 'update'])->name('contact.update');
    Route::get('contact-message', [ContactMessageController::class, 'index'])->name('contact-message.index');
    Route::post('contact-send-reply', [ContactMessageController::class, 'sendReply'])->name('contact.send-reply');
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('general-setting', [SettingController::class, 'updateGeneralSetting'])->name('general-setting.update');
    Route::put('seo-setting', [SettingController::class, 'updateSeoSetting'])->name('seo-setting.update');
    Route::put('appearance-setting', [SettingController::class, 'updateAppearanceSetting'])->name('appearance-setting.update');
    Route::get('role', [RolePermissionController::class, 'index'])->name('role.index');
    Route::get('role/create', [RolePermissionController::class, 'create'])->name('role.create');
    Route::post('role/create', [RolePermissionController::class, 'store'])->name('role.store');
    Route::get('role/{id}/edit', [RolePermissionController::class, 'edit'])->name('role.edit');
    Route::put('role/{id}/edit', [RolePermissionController::class, 'update'])->name('role.update');
    Route::delete('role/{id}/destroy', [RolePermissionController::class, 'destroy'])->name('role.destroy');
    Route::delete('role/{id}/destroy', [RolePermissionController::class, 'destroy'])->name('role.destroy');
    Route::resource('role-users', RoleUserController::class);
    Route::get('admin-localization', [LocalizationController::class, 'adminIndex'])->name('admin-localization.index');
    Route::get('frontend-localization', [LocalizationController::class, 'frontendIndex'])->name('frontend-localization.index');
    Route::post('extract-localize-strings', [LocalizationController::class, 'extractLocalizationStrings'])->name('extract-localize-strings');
    Route::post('update-lang-string', [LocalizationController::class, 'updateLangString'])->name('update-lang-string');
    Route::post('translate-string', [LocalizationController::class, 'translateString'])->name('translate-string');
    Route::put('microsoft-api-setting', [SettingController::class, 'updateMicrosoftApiSetting'])->name('microsoft-api-setting.update');
});
