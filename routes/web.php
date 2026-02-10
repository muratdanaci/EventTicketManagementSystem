<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Web\HomeEventController;
use App\Http\Controllers\Event\TicketController;
use App\Http\Controllers\Event\TicketOrderController;
use App\Http\Controllers\Event\OrderController;
use App\Http\Controllers\Event\CheckInController;
use App\Http\Controllers\Event\UserTicketController;
use App\Http\Controllers\Event\SalesReportController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeEventController::class, 'index'])->name('home');
Route::get('/events', [HomeEventController::class, 'events'])->name('events');
Route::get('/events/{event}', [HomeEventController::class, 'show'])->name('events.show');

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
    Route::post('/tickets/{ticket}/buy', [OrderController::class, 'store'])
        ->name('tickets.buy');

    Route::prefix('admin')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/settings', [SettingsController::class, 'index'])
            ->name('settings.index');

        Route::post('/settings/password', [SettingsController::class, 'updatePassword'])
            ->name('settings.password.update');

        Route::resource('events', EventController::class);

        Route::resource('events.tickets', TicketController::class)
            ->except(['show']);

        Route::get('/ticket-orders', [TicketOrderController::class, 'index'])
            ->name('ticket-orders.index');

        Route::get('check-in', [CheckInController::class, 'index'])
            ->name('checkin.index');

        Route::post('check-in/search', [CheckInController::class, 'search'])
            ->name('checkin.search');

        Route::post('check-in/{checkIn}/confirm', [CheckInController::class, 'confirm'])
            ->name('checkin.confirm');

        Route::get('/my-tickets', [UserTicketController::class, 'index'])
            ->name('mytickets');

        Route::get('/events/{event}/sales-report', [SalesReportController::class, 'show'])
            ->name('events.sales.report');

        Route::get('/events/{event}/sales/pdf', [SalesReportController::class, 'salesPdf'])
            ->name('events.sales.pdf');
    });
});
