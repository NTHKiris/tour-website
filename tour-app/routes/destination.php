<?php
use App\Http\Controllers\DestinationController;

Route::prefix('destinations')->group(function () {
    Route::get('/', [DestinationController::class, 'index'])->name('destinations.index');
    Route::get('/create', [DestinationController::class, 'create'])->middleware('auth')->name('destinations.create');
    Route::post('/', [DestinationController::class, 'store'])->middleware('auth')->name('destinations.store');
    Route::get('/{destination}/edit', [DestinationController::class, 'edit'])->middleware('auth')->name('destinations.edit');
    Route::put('/{destination}', [DestinationController::class, 'update'])->middleware('auth')->name('destinations.update');
    Route::delete('/{destination}', [DestinationController::class, 'destroy'])->middleware('auth')->name('destinations.destroy');
    Route::post('/{id}/restore', [DestinationController::class, 'restore'])->middleware('auth')->name('destinations.restore');
    Route::delete('/{id}/force-delete', [DestinationController::class, 'forceDelete'])->middleware('auth')->name('destinations.forceDelete');
    Route::get('/{destination}', [DestinationController::class, 'show'])->name('destinations.show');
});
