<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HajjController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\UmrahController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ManasikController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonialController;

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
Route::get('/hajj/{id}', [HajjController::class, 'showPackage'])->name('show-hajj-package');

Route::get('/umrah', [UmrahController::class, 'index'])->name('umrah');
Route::get('/umrah/{id}', [UmrahController::class, 'showPackage'])->name('show-umrah-package');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');


Route::get('/admin-dashboard', [DashboardController::class, 'admin'])->middleware('auth', 'verified', 'is_admin')->name('admin-dashboard');

Route::get('/admin/users', [UserController::class, 'index'])->middleware('auth', 'verified', 'is_admin')->name('users-dashboard');
Route::get('/admin/users/create', [UserController::class, 'create'])->middleware('auth', 'verified', 'is_admin')->name('create-user');
Route::post('/admin/users', [UserController::class, 'store'])->middleware('auth', 'verified', 'is_admin')->name('store-user');
Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->middleware('auth', 'verified', 'is_admin')->name('edit-user');
Route::get('/admin/users/{id}', [UserController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-user');
Route::put('/admin/users/{id}', [UserController::class, 'update'])->middleware('auth', 'verified', 'is_admin')->name('update-user');
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('delete-user');

Route::get('/admin/hajj', [HajjController::class, 'dashboard'])->middleware('auth', 'verified', 'is_admin')->name('hajj-dashboard');
Route::get('/admin/hajj/create', [HajjController::class, 'create'])->middleware('auth', 'verified', 'is_admin')->name('create-hajj');
Route::post('/admin/hajj', [HajjController::class, 'store'])->middleware('auth', 'verified', 'is_admin')->name('store-hajj');
Route::get('/admin/hajj/{id}/edit', [HajjController::class, 'edit'])->middleware('auth', 'verified', 'is_admin')->name('edit-hajj');
Route::get('/admin/hajj/{id}', [HajjController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-hajj');
Route::put('/admin/hajj/{id}', [HajjController::class, 'update'])->middleware('auth', 'verified', 'is_admin')->name('update-hajj');
Route::delete('/admin/hajj/{id}', action: [HajjController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('delete-hajj');

Route::get('/admin/umrah', [UmrahController::class, 'dashboard'])->middleware('auth', 'verified', 'is_admin')->name('umrah-dashboard');
Route::get('/admin/umrah/create', [UmrahController::class, 'create'])->middleware('auth', 'verified', 'is_admin')->name('create-umrah');
Route::post('/admin/umrah', [UmrahController::class, 'store'])->middleware('auth', 'verified', 'is_admin')->name('store-umrah');
Route::get('/admin/umrah/{id}/edit', [UmrahController::class, 'edit'])->middleware('auth', 'verified', 'is_admin')->name('edit-umrah');
Route::get('/admin/umrah/{id}', [UmrahController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-umrah');
Route::put('/admin/umrah/{id}', [UmrahController::class, 'update'])->middleware('auth', 'verified', 'is_admin')->name('update-umrah');
Route::delete('/admin/umrah/{id}', [UmrahController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('delete-umrah');

Route::get('/admin/gallery', [GalleryController::class, 'dashboard'])->middleware('auth', 'verified', 'is_admin')->name('gallery-dashboard');
Route::get('/admin/gallery/create', [GalleryController::class, 'create'])->middleware('auth', 'verified', 'is_admin')->name('create-gallery');
Route::post('/admin/gallery', [GalleryController::class, 'store'])->middleware('auth', 'verified', 'is_admin')->name('store-gallery');
Route::get('/admin/gallery/{id}/edit', [GalleryController::class, 'edit'])->middleware('auth', 'verified', 'is_admin')->name('edit-gallery');
Route::get('/admin/gallery/{id}', [GalleryController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-gallery');
Route::put('/admin/gallery/{id}', [GalleryController::class, 'update'])->middleware('auth', 'verified', 'is_admin')->name('update-gallery');
Route::delete('/admin/gallery/{id}', [GalleryController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('delete-gallery');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth', 'verified')->name('profile');
Route::get('/profile/personal-informations/edit', [ProfileController::class, 'editPersonalInformations'])->middleware('auth', 'verified')->name('edit-personal-informations');
Route::put('/profile', [ProfileController::class, 'updatePersonalInformations'])->middleware('auth', 'verified')->name('update-personal-informations');

Route::get('/profile/documents', [ProfileController::class, 'documents'])->middleware('auth', 'verified')->name('profile-documents');
Route::get('/profile/documents/edit', [ProfileController::class, 'editDocuments'])->middleware('auth', 'verified')->name('edit-profile-documents');
Route::put('/profile/documents', [ProfileController::class, 'updateDocuments'])->middleware('auth', 'verified')->name('update-profile-documents');
Route::delete('/profile/documents/{field}', [ProfileController::class, 'destroyDocument'])->middleware('auth', 'verified')->name('delete-profile-document');

Route::get('/profile/security', [ProfileController::class, 'security'])->middleware('auth', 'verified')->name('profile-security');
Route::get('/profile/security/edit', [ProfileController::class, 'editSecurity'])->middleware('auth', 'verified')->name('edit-security');
Route::put('/profile/security', [ProfileController::class, 'updateSecurity'])->middleware('auth', 'verified')->name('update-security');

Route::get('/user/hajj/list', [HajjController::class, 'list'])->middleware('auth', 'verified')->name('hajj-list');
Route::get('/user/hajj/list/{id}', [HajjController::class, 'showList'])->middleware('auth', 'verified')->name('show-hajj-list');
Route::post('/user/hajj/list/{id}/submit', [HajjController::class, 'submit'])->middleware('auth', 'verified')->name('submit-hajj-package');


Route::get('/user/umrah/list', [UmrahController::class, 'list'])->middleware('auth', 'verified')->name('umrah-list');
Route::get('/user/umrah/list/{id}', [UmrahController::class, 'showList'])->middleware('auth', 'verified')->name('show-umrah-list');
Route::post('/user/umrah/list/{id}/submit', [UmrahController::class, 'submit'])->middleware('auth', 'verified')->name('submit-umrah-package');

Route::get('/payments', [PaymentController::class, 'index'])->middleware('auth', 'verified')->name('my-payments');
Route::get('/payments/{id}', [PaymentController::class, 'showMyPayment'])->middleware('auth', 'verified')->name('show-my-payment');
Route::put('/payments/{id}', [PaymentController::class, 'updateMyPayment'])->middleware('auth', 'verified')->name('update-my-payment');

Route::get('/admin/payments', [PaymentController::class, 'dashboard'])->middleware('auth', 'verified', 'is_admin')->name('payments-dashboard');
Route::get('/admin/payment/{id}', [PaymentController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-payment');
Route::get('/admin/payment/{id}/edit', [PaymentController::class, 'edit'])->middleware('auth', 'verified', 'is_admin')->name('edit-payment');
Route::put('/admin/payment/{id}', [PaymentController::class, 'update'])->middleware('auth', 'verified', 'is_admin')->name('update-payment');
Route::delete('/admin/payment/{id}', [PaymentController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('delete-payment');

Route::get('/admin/trip', [TripController::class, 'index'])->middleware('auth', 'verified', 'is_admin')->name('trip-dashboard');
Route::get('/admin/trip/create', [TripController::class, 'create'])->middleware('auth', 'verified', 'is_admin')->name('create-trip');
Route::post('/admin/trip', [TripController::class, 'store'])->middleware('auth', 'verified', 'is_admin')->name('store-trip');
Route::get('/admin/trip/{id}/edit', [TripController::class, 'edit'])->middleware('auth', 'verified', 'is_admin')->name('edit-trip');
Route::get('/admin/trip/{id}', [TripController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-trip');
Route::put('/admin/trip/{id}', [TripController::class, 'update'])->middleware('auth', 'verified', 'is_admin')->name('update-trip');
Route::delete('/admin/trip/{id}', [TripController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('delete-trip');

Route::get('/my-trips', [TripController::class, 'myTrips'])->middleware('auth', 'verified')->name('my-trips');
Route::get('/my-trips/{id}', [TripController::class, 'showMyTrip'])->middleware('auth', 'verified')->name('show-my-trip');

Route::post('/contact', [ContactController::class, 'store'])->name('store-contact');
Route::get('/admin/contact', [ContactController::class, 'dashboard'])->middleware('auth', 'verified', 'is_admin')->name('contact-dashboard');
Route::get('/admin/contact/{id}', [ContactController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-contact');
Route::delete('/admin/contact/{id}', [ContactController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('delete-contact');

Route::get('/admin/testimonials', [TestimonialController::class, 'dashboard'])->middleware('auth', 'verified', 'is_admin')->name('testimonial-dashboard');
Route::get('/admin/testimonials/create', [TestimonialController::class, 'create'])->middleware('auth', 'verified', 'is_admin')->name('create-testimonial');
Route::post('/admin/testimonials', [TestimonialController::class, 'store'])->middleware('auth', 'verified', 'is_admin')->name('store-testimonial');
Route::get('/admin/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->middleware('auth', 'verified', 'is_admin')->name('edit-testimonial');
Route::get('/admin/testimonials/{id}', [TestimonialController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-testimonial');
Route::put('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->middleware('auth', 'verified', 'is_admin')->name('update-testimonial');
Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('delete-testimonial');

Route::get('/admin/report/jamaah', [ReportController::class, 'jamaah'])->middleware('auth', 'verified', 'is_admin')->name('report-jamaah');
Route::get('/admin/report/jamaah/export', [ReportController::class, 'exportJamaah'])->middleware('auth', 'verified', 'is_admin')->name('export-jamaah');

Route::get('/admin/report/hajj/documents', [ReportController::class, 'hajjDocuments'])->middleware('auth', 'verified', 'is_admin')->name('report-hajj-documents');
Route::get('/admin/report/hajj/documents/export/{id}', [ReportController::class, 'exportHajjDocuments'])->middleware('auth', 'verified', 'is_admin')->name('export-hajj-documents');
Route::get('/admin/report/hajj/payments', [ReportController::class, 'hajjPayments'])->middleware('auth', 'verified', 'is_admin')->name('report-hajj-payments');
Route::get('/admin/report/hajj/payments/export/{id}', [ReportController::class, 'exportHajjPayments'])->middleware('auth', 'verified', 'is_admin')->name('export-hajj-payments');

Route::get('/admin/report/umrah/documents', [ReportController::class, 'umrahDocuments'])->middleware('auth', 'verified', 'is_admin')->name('report-umrah-documents');
Route::get('/admin/report/umrah/documents/export/{id}', [ReportController::class, 'exportUmrahDocuments'])->middleware('auth', 'verified', 'is_admin')->name('export-umrah-documents');
Route::get('/admin/report/umrah/payments', [ReportController::class, 'umrahPayments'])->middleware('auth', 'verified', 'is_admin')->name('report-umrah-payments');
Route::get('/admin/report/umrah/payments/export/{id}', [ReportController::class, 'exportUmrahPayments'])->middleware('auth', 'verified', 'is_admin')->name('export-umrah-payments');

Route::get('/admin/manasik', [ManasikController::class, 'dashboard'])->middleware('auth', 'verified', 'is_admin')->name('manasik-dashboard');
Route::get('/admin/manasik/create', [ManasikController::class, 'create'])->middleware('auth', 'verified', 'is_admin')->name('create-manasik');
Route::post('/admin/manasik', [ManasikController::class, 'store'])->middleware('auth', 'verified', 'is_admin')->name('store-manasik');
Route::get('/admin/manasik/{id}/edit', [ManasikController::class, 'edit'])->middleware('auth', 'verified', 'is_admin')->name('edit-manasik');
Route::get('/admin/manasik/{id}', [ManasikController::class, 'show'])->middleware('auth', 'verified', 'is_admin')->name('show-manasik');
Route::put('/admin/manasik/{id}', [ManasikController::class, 'update'])->middleware('auth', 'verified', 'is_admin')->name('update-manasik');
Route::delete('/admin/manasik/{id}', [ManasikController::class, 'destroy'])->middleware('auth', 'verified', 'is_admin')->name('delete-manasik');

Route::get('/my-manasik', [ManasikController::class, 'myManasik'])->middleware('auth', 'verified')->name('my-manasik');
Route::get('/my-manasik/{id}', [ManasikController::class, 'showMyManasik'])->middleware('auth', 'verified')->name('show-my-manasik');