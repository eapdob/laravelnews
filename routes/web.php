<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('language', LanguageController::class)->name('language');
Route::get('news-details/{slug}', [HomeController::class, 'showNews'])->name('news-details');
Route::get('news', [HomeController::class, 'news'])->name('news');
Route::post('news-comment', [HomeController::class, 'handleComment'])->name('news-comment');
Route::post('news-comment-reply', [HomeController::class, 'handleReply'])->name('news-comment-reply');
Route::delete('news-comment-destroy', [HomeController::class, 'commentDestroy'])->name('news-comment-destroy');
Route::post('subscribe-newsletter', [HomeController::class, 'SubscribeNewsletter'])->name('subscribe-newsletter');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact', [HomeController::class, 'handleContact'])->name('contact.submit');
