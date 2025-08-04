<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ImageController;

use App\Models\Tour;

Route::get('/', function () {
    $tours = Tour::orderBy('featured', 'desc')->take(3)->get();
    return view('home', data: compact('tours'));

});

Route::get('/about', function () {
    return view('aboutme');
});

Route::get('/home', function () {
    $tours = Tour::orderBy('featured', 'desc')->take(3)->get();
    return view('home', data: compact('tours'));
})->middleware(['auth', 'verified'])->name('home');


Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('images.destroy');

Route::resource('reviews', ReviewController::class);

Route::get('/reviews/search', [ReviewController::class, 'show'])->name('reviews.search');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');


require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/posts.php';
require __DIR__ . '/tours.php';
require __DIR__ . '/destination.php';
