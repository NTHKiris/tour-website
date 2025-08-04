<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\PostCategoryController;


Route::prefix('admin')->group(function () {
    Route::get('/tours', [TourController::class, 'adminIndex'])->name('admin.tours.index');
    Route::get('/posts', [PostController::class, 'adminIndex'])->name('admin.posts.index');
    Route::get('/posts-categories', [PostCategoryController::class, 'index'])->name('admin.posts-categories.index');
});


