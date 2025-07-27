<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HajjController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\UmrahController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonialsController;

// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'attemptLogin'])->name('attempt_login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'attemptRegister'])->name('attempt_register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Email verification
Route::get('/email/verify', [AuthController::class, 'noticeVerifyEmail'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [AuthController::class, 'resendVerification'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

// Forgot password
Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/hajj', [HajjController::class, 'index'])->name('hajj');

Route::get('/umrah', [UmrahController::class, 'index'])->name('umrah');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/testimonials', [TestimonialsController::class, 'index'])->name('testimonials');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');


Route::get('/admin-dashboard', [DashboardController::class, 'admin'])->middleware('auth', 'verified', 'is_admin')->name('admin-dashboard');
Route::get('/user-dashboard', [DashboardController::class, 'user'])->middleware('auth', 'verified')->name('user-dashboard');

Route::get('/users', [UserController::class, 'index'])->middleware('auth', 'verified', 'is_admin')->name('users');
Route::get('/users/create', [UserController::class, 'create'])->middleware('auth', 'verified', 'is_admin')->name('create-user');
Route::post('/users', [UserController::class, 'store'])->middleware('auth', 'verified', 'is_admin')->name('store-user');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->middleware('auth', 'verified', 'is_admin')->name('edit-user');
Route::get('/users/{id}', [UserController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-user');
Route::put('/users/{id}', [UserController::class, 'update'])->middleware('auth', 'verified', 'is_admin')->name('update-user');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('destroy-user');

Route::get('/hajj/dashboard', [HajjController::class, 'dashboard'])->middleware('auth', 'verified', 'is_admin')->name('hajj-dashboard');
Route::get('/hajj/create', [HajjController::class, 'create'])->middleware('auth', 'verified', 'is_admin')->name('create-hajj');
Route::post('/hajj', [HajjController::class, 'store'])->middleware('auth', 'verified', 'is_admin')->name('store-hajj');
Route::get('/hajj/{id}/edit', [HajjController::class, 'edit'])->middleware('auth', 'verified', 'is_admin')->name('edit-hajj');
Route::get('/hajj/{id}', [HajjController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-hajj');
Route::put('/hajj/{id}', [HajjController::class, 'update'])->middleware('auth', 'verified', 'is_admin')->name('update-hajj');
Route::delete('/hajj/{id}', [HajjController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('destroy-hajj');

Route::get('/umrah/dashboard', [UmrahController::class, 'dashboard'])->middleware('auth', 'verified', 'is_admin')->name('umrah-dashboard');
Route::get('/umrah/create', [UmrahController::class, 'create'])->middleware('auth', 'verified', 'is_admin')->name('create-umrah');
Route::post('/umrah', [UmrahController::class, 'store'])->middleware('auth', 'verified', 'is_admin')->name('store-umrah');
Route::get('/umrah/{id}/edit', [UmrahController::class, 'edit'])->middleware('auth', 'verified', 'is_admin')->name('edit-umrah');
Route::get('/umrah/{id}', [UmrahController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-umrah');
Route::put('/umrah/{id}', [UmrahController::class, 'update'])->middleware('auth', 'verified', 'is_admin')->name('update-umrah');
Route::delete('/umrah/{id}', [UmrahController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('destroy-umrah');