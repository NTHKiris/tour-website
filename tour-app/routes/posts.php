<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCategoryController;
use Illuminate\Support\Facades\Route;





Route::resource('post-categories', PostCategoryController::class)->except(['index']);

Route::resource('posts', PostController::class)->except(['index', 'show'])->middleware('auth');
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('posts/{id}/restore', [PostController::class, 'restore'])->middleware('auth')->name('posts.restore');
Route::delete('posts/{id}/force-delete', [PostController::class, 'forceDelete'])->middleware('auth')->name('posts.forceDelete');