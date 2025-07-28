<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::resource('reviews', ReviewController::class);

Route::get('/reviews/search', [ReviewController::class, 'show'])->name('reviews.search');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::resource('tours', TourController::class);



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
require __DIR__ . '/auth.php';
