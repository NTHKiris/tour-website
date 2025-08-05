<?php
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\PostCategoryController;


Route::prefix('admin')->group(function () {
    Route::get('/tours-trash', [TourController::class, 'trash'])->name('admin.tours.trash');
    Route::get('/tours', [TourController::class, 'adminIndex'])->name('admin.tours.index');
    Route::get('/posts', [PostController::class, 'adminIndex'])->name('admin.posts.index');
    Route::get('/posts-trash', [PostController::class, 'trash'])->name('admin.posts.trash');
    Route::get('/posts-categories', [PostCategoryController::class, 'index'])->name('admin.posts-categories.index');
    Route::get('/destinations', [DestinationController::class, 'adminIndex'])->name('admin.destinations.index');
});


