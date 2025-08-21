<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LoginNotification;
use App\Http\Controllers\GoogleAuthController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// User and Admin dashboard routes per folders
Route::view('user/dashboard', 'User/Dashboard/index')->middleware(['auth', 'verified'])->name('user.dashboard');
Route::view('admin/dashboard', 'Admin/Dashboard/index')->middleware(['auth', 'verified', 'role:admin'])->name('admin.dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// Admin authentication routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->middleware(['auth','role:admin']);
    Route::resource('buildings', \App\Http\Controllers\Admin\BuildingController::class)->middleware(['auth','role:admin']);
    Route::resource('rooms', \App\Http\Controllers\Admin\RoomController::class)->middleware(['auth','role:admin']);
    Route::resource('cctvs', \App\Http\Controllers\Admin\CctvController::class)->middleware(['auth','role:admin']);
    Route::resource('locations', \App\Http\Controllers\Admin\LocationController::class)->middleware(['auth','role:admin']);
    Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->middleware(['auth','role:admin']);
});

// Maps and user pages
Route::get('/maps', \App\Livewire\User\Maps\Index::class)->middleware(['auth','verified'])->name('user.maps');
Route::get('/stream/{cctv}', [\App\Http\Controllers\StreamController::class, 'hls'])->middleware(['auth','verified'])->name('stream.hls');
Route::get('/export/users', [\App\Http\Controllers\ExportController::class, 'users'])->middleware(['auth','verified'])->name('export.users');
Route::get('/export/cctvs', [\App\Http\Controllers\ExportController::class, 'cctvs'])->middleware(['auth','verified'])->name('export.cctvs');
Route::get('/chat', \App\Livewire\Chat\Panel::class)->middleware(['auth','verified'])->name('chat.panel');

// Google Identity Services token endpoint
Route::post('/auth/google/token', [GoogleAuthController::class, 'tokenLogin'])->name('google.token');