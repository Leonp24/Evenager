<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

// sementara
Route::get('/buat-admin', function () {
    Admin::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('password123'),
    ]);

    return 'Admin berhasil dibuat!';
});

// ========================
// ✨ User Routes
// ========================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [EventController::class, 'all'])->name('event.all');


// Event detail + registrasi
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.detail');
Route::post('/register/{id}', [EventController::class, 'register'])->name('event.register');

// ========================
// 🔐 Admin Auth
// ========================
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ========================
// 🛡️ Admin Protected Routes
// ========================
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('/events', AdminEventController::class)->names([
        'index'   => 'admin.events.index',
        'create'  => 'admin.events.create',
        'store'   => 'admin.events.store',
        'edit'    => 'admin.events.edit',
        'update'  => 'admin.events.update',
        'destroy' => 'admin.events.destroy',
    ]);
});
Route::get('/admin/events/{id}/registrations', [AdminController::class, 'registrations'])->name('admin.events.registrations');
