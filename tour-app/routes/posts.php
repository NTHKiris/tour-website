<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;





Route::get('/admin/posts', [PostController::class, 'adminIndex'])->name('admin.posts.index');

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