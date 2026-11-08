<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProgressController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestimonialController;

use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Customer\PaymentController as CustomerPaymentController;
use App\Http\Controllers\Customer\ProjectController as CustomerProjectController;
use App\Http\Controllers\Customer\TestimonialController as CustomerTestimonialController;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ==========================================
// HALAMAN PUBLIK
// ==========================================

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/tentang-kami', [PublicController::class, 'about'])->name('about');
Route::get('/layanan', [PublicController::class, 'services'])->name('services');
Route::get('/cara-kerja', [PublicController::class, 'howItWorks'])->name('how-it-works');
Route::get('/portofolio', [PublicController::class, 'portfolio'])->name('portfolio');
Route::get('/testimoni', [PublicController::class, 'testimonials'])->name('testimonials');

// ==========================================
// BOOKING KONSULTASI
// ==========================================

Route::get('/booking-konsultasi', [PublicController::class, 'booking'])
    ->middleware('auth')
    ->name('booking');

Route::post('/booking-konsultasi', [PublicController::class, 'storeBooking'])
    ->middleware(['auth', 'role:customer'])
    ->name('booking.store');

// ==========================================
// DASHBOARD SESUAI ROLE
// ==========================================

Route::get('/dashboard', function () {
    return redirect(
        auth()->user()->role === 'admin'
            ? route('admin.dashboard')
            : route('customer.dashboard')
    );
})->middleware(['auth', 'verified'])->name('dashboard');

// ==========================================
// AREA ADMIN
// ==========================================

Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('customers', CustomerController::class);
        Route::resource('projects', ProjectController::class);

        Route::get('progress', [ProgressController::class, 'index'])->name('progress.index');
        Route::get('progress/{project}', [ProgressController::class, 'show'])->name('progress.show');
        Route::post('progress/{project}', [ProgressController::class, 'store'])->name('progress.store');

        Route::get('payments', [PaymentController::class, 'index'])->name('payments.index');
        Route::get('payments/create', [PaymentController::class, 'create'])->name('payments.create');
        Route::post('payments', [PaymentController::class, 'store'])->name('payments.store');
        Route::patch('payments/{payment}', [PaymentController::class, 'updateStatus'])->name('payments.update-status');
        Route::delete('payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');

        Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
        Route::patch('bookings/{booking}', [BookingController::class, 'updateStatus'])->name('bookings.update-status');
        Route::delete('bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

        Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
        Route::patch('testimonials/{testimonial}/approve', [TestimonialController::class, 'approve'])->name('testimonials.approve');
        Route::patch('testimonials/{testimonial}/reject', [TestimonialController::class, 'reject'])->name('testimonials.reject');
        Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

        Route::resource('portfolios', PortfolioController::class);
        Route::delete('portfolio-images/{image}', [PortfolioController::class, 'deleteImage'])->name('portfolios.delete-image');
    });

// ==========================================
// AREA CUSTOMER
// ==========================================

Route::middleware(['auth', 'verified', 'role:customer'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');

        Route::get('projects', [CustomerProjectController::class, 'index'])->name('projects.index');
        Route::get('projects/{project}', [CustomerProjectController::class, 'show'])->name('projects.show');

        Route::get('payments', [CustomerPaymentController::class, 'index'])->name('payments.index');
        Route::post('payments/{payment}/upload', [CustomerPaymentController::class, 'uploadProof'])->name('payments.upload');

        Route::get('testimonials', [CustomerTestimonialController::class, 'index'])->name('testimonials.index');
        Route::post('testimonials', [CustomerTestimonialController::class, 'store'])->name('testimonials.store');

        Route::get('bookings', [\App\Http\Controllers\Customer\BookingController::class, 'index'])->name('bookings.index');
        Route::get('bookings/create', [\App\Http\Controllers\Customer\BookingController::class, 'create'])->name('bookings.create');
        Route::post('bookings', [\App\Http\Controllers\Customer\BookingController::class, 'store'])->name('bookings.store');
    });

// ==========================================
// PROFIL
// ==========================================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
