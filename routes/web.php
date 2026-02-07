<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('web.index');
});

// Admin Login UI
Route::get('admin/login', function () {
    return view('admin.auth.login');
})->name('admin.login');

// Admin Dashboard UI
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
