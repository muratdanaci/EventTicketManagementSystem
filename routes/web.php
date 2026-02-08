<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('web.index');
})->name('home');

// GUEST
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    // Register (Sadece attendee)
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.post');

    Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])
        ->middleware('guest')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])
        ->middleware('guest')
        ->name('password.email');

    // Yeni şifre belirleme
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])
        ->middleware('guest')
        ->name('password.reset');

    Route::post('/reset-password', [PasswordResetController::class, 'reset'])
        ->middleware('guest')
        ->name('password.update');
});

// AUTH
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/settings', [SettingsController::class, 'index'])
        ->name('settings.index');

    Route::post('/settings/password', [SettingsController::class, 'updatePassword'])
        ->name('settings.password.update');
});
