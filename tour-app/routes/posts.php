<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('post-categories')->group(function () {
    Route::get('/', [PostCategoryController::class, 'index'])->name('post-categories.index');
    Route::get('/create', [PostCategoryController::class, 'create'])->middleware('auth')->name('post-categories.create');
    Route::post('/', [PostCategoryController::class, 'store'])->middleware('auth')->name('post-categories.store');
    Route::get('/{postCategory}/edit', [PostCategoryController::class, 'edit'])->middleware('auth')->name('post-categories.edit');
    Route::put('/{postCategory}', [PostCategoryController::class, 'update'])->middleware('auth')->name('post-categories.update');
    Route::delete('/{postCategory}', [PostCategoryController::class, 'destroy'])->middleware('auth')->name('post-categories.destroy');
    Route::get('/{postCategory}', [PostCategoryController::class, 'show'])->name('post-categories.show');
});


Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create', [PostController::class, 'create'])->middleware('auth')->name('posts.create');
    Route::post('/', [PostController::class, 'store'])->middleware('auth')->name('posts.store');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->middleware('auth')->name('posts.edit');
    Route::put('/{post}', [PostController::class, 'update'])->middleware('auth')->name('posts.update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->middleware('auth')->name('posts.destroy');
    Route::post('/{id}/restore', [PostController::class, 'restore'])->middleware('auth')->name('posts.restore');
    Route::delete('/{id}/force-delete', [PostController::class, 'forceDelete'])->middleware('auth')->name('posts.forceDelete');
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
});