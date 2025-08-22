<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use Illuminate\Support\Facades\Route;

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

// User pages
Route::view('user/locations', 'User/Location/index')->middleware(['auth', 'verified'])->name('user.locations');
Route::get('user/rooms/{building}', [\App\Http\Controllers\User\BrowseController::class, 'rooms'])->middleware(['auth', 'verified'])->name('user.rooms');
Route::get('user/cctvs/{building}/{room}', [\App\Http\Controllers\User\BrowseController::class, 'cctvs'])->middleware(['auth', 'verified'])->name('user.cctvs');
Route::view('user/contact', 'User/Contact/index')->middleware(['auth', 'verified'])->name('user.contact');

// Admin authentication routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::get('/table', \App\Http\Controllers\Admin\TableController::class)->middleware(['auth', 'role:admin'])->name('table');
    Route::view('/register', 'admin/auth/register')->name('register');
    Route::view('/forgot-password', 'admin/auth/forgot-password')->name('password.request');
    Route::view('/reset-password/{token}', 'admin/auth/reset-password')->name('password.reset');
    Route::view('/verify-email', 'admin/auth/verify-email')->middleware(['auth'])->name('verification.notice');
    Route::view('/confirm-password', 'admin/auth/confirm-password')->middleware(['auth'])->name('password.confirm');

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->middleware(['auth', 'role:admin']);
    Route::resource('buildings', \App\Http\Controllers\Admin\BuildingController::class)->middleware(['auth', 'role:admin']);
    Route::resource('rooms', \App\Http\Controllers\Admin\RoomController::class)->middleware(['auth', 'role:admin']);
    Route::resource('cctvs', \App\Http\Controllers\Admin\CctvController::class)->middleware(['auth', 'role:admin']);
    Route::resource('locations', \App\Http\Controllers\Admin\LocationController::class)->middleware(['auth', 'role:admin']);
    Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->middleware(['auth', 'role:admin']);
});

// Maps and user pages
Route::view('/maps', 'User/Maps/index')->middleware(['auth', 'verified'])->name('user.maps');
Route::get('/stream/{cctv}', [\App\Http\Controllers\StreamController::class, 'hls'])->middleware(['auth', 'verified'])->name('stream.hls');

// Password OTP routes
Route::post('/password/otp/request', [\App\Http\Controllers\PasswordOtpController::class, 'requestOtp'])->middleware('guest')->name('password.otp.request');
Route::post('/password/otp/verify', [\App\Http\Controllers\PasswordOtpController::class, 'verifyOtp'])->middleware('guest')->name('password.otp.verify');
Route::get('/export/users', [\App\Http\Controllers\ExportController::class, 'users'])->middleware(['auth', 'verified'])->name('export.users');
Route::get('/export/cctvs', [\App\Http\Controllers\ExportController::class, 'cctvs'])->middleware(['auth', 'verified'])->name('export.cctvs');
Route::get('/chat', \App\Livewire\Chat\Panel::class)->middleware(['auth', 'verified'])->name('chat.panel');
Route::view('/notifications', 'User/Notification/index')->middleware(['auth', 'verified'])->name('user.notifications');
Route::view('/admin/notifications', 'Admin/Notification/index')->middleware(['auth', 'verified', 'role:admin'])->name('admin.notifications');
