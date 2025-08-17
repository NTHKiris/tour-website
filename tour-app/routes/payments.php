<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // Payment creation routes
    Route::get('/bookings/{booking}/payments/create', [PaymentController::class, 'create'])
        ->name('payments.create');
    
    Route::post('/bookings/{booking}/payments', [PaymentController::class, 'store'])
        ->name('payments.store');
    
    // Individual payment method routes
    Route::get('/payments/{payment}/vnpay', [PaymentController::class, 'vnpay'])
        ->name('payments.vnpay');
    
    Route::get('/payments/{payment}/momo', [PaymentController::class, 'momo'])
        ->name('payments.momo');
    
    Route::get('/payments/{payment}/bank-info', [PaymentController::class, 'bankInfo'])
        ->name('payments.bank-info');
});

// Payment callback routes (no auth middleware needed)
Route::get('/payments/vnpay/callback', [PaymentController::class, 'vnpayCallback'])
    ->name('payments.vnpay.callback');

Route::post('/payments/momo/callback', [PaymentController::class, 'momoCallback'])
    ->name('payments.momo.callback');

Route::get('/payments/momo/callback', [PaymentController::class, 'momoCallback'])
    ->name('payments.momo.callback');

// Legacy process route for backward compatibility
Route::post('/payments/process/{provider}', function() {
    return redirect()->route('payments.create');
})->name('payments.process');
