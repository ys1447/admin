<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'admin']);
    Route::get('/articles', [ArticleController::class, 'article'])->name('articles');
    Route::get('/categories', [ArticleController::class, 'categories'])->name('categories');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('create');
    Route::post('/articles/create', [ArticleController::class, 'createStore'])->name('create.store');
    Route::get('/articles/create/category', [CategoryController::class, 'category'])->name('category');
    Route::post('/articles/create/category', [CategoryController::class, 'categoryStore'])->name('category.store');
});



