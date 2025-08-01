<?php
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

Route::prefix('tours')->group(function () {
    Route::get('/', [TourController::class, 'index'])->name('tours.index');

    Route::get('/create', [TourController::class, 'create'])->middleware('auth')->name('tours.create');
    Route::post('/', [TourController::class, 'store'])->middleware('auth')->name('tours.store');
    Route::get('/{id}/edit', [TourController::class, 'edit'])->middleware('auth')->name('tours.edit');
    Route::put('/{id}', [TourController::class, 'update'])->middleware('auth')->name('tours.update');
    Route::delete('/{id}', [TourController::class, 'destroy'])->middleware('auth')->name('tours.destroy');
    Route::post('/{id}/restore', [TourController::class, 'restore'])->middleware('auth')->name('tours.restore');
    Route::delete('/{id}/force-delete', [TourController::class, 'forceDelete'])->middleware('auth')->name('tours.forceDelete');

    Route::get('/{id}', [TourController::class, 'show'])->name('tours.show');
});