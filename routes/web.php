<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController as ArticleController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\DashboardController as DashboardController;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\TagController as TagController;
use App\Models\Article;

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

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('article', ArticleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
});

Route::get('/', [HomeController::class, 'index'])->name('index');;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->middleware(['auth', 'verified'])->name('admin.article.show');

Route::get('/articles/{article}', [HomeController::class, 'show'])->name('articles.show');

Route::view('about', 'about')->name('about');

require __DIR__.'/auth.php';
