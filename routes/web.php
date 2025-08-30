<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

// 5 Page utama
Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::resource('news', NewsController::class)->only(['index', 'show']);
Route::resource('activities', ActivityController::class)->only(['index', 'show']);
Route::get('/contact', [PageController::class, 'contact']);

Route::post('/kontak', [ContactController::class, 'send'])->name('kontak.send');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('news', NewsController::class)->except(['index', 'show']);
    Route::resource('activities', ActivityController::class)->except(['index', 'show']);
});
