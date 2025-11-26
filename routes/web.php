<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;

Route::get('/', function () {
    return view('home.homepage');
});




Route::get('/wallet/register', [WalletController::class, 'showRegister'])->name('wallet.register');
Route::post('/wallet/register', [WalletController::class, 'register'])->name('wallet.register.post');

Route::post('/wallet/login', [WalletController::class, 'login'])->name('wallet.login');
Route::get('/wallet/generate', [WalletController::class, 'generate'])->name('wallet.generate');

