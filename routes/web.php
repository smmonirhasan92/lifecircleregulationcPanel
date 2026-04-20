<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    $early_bird_deadline = \App\Models\Setting::get('early_bird_deadline');
    return view('home', compact('early_bird_deadline'));
})->name('home');

// Static Information Pages
Route::view('/gallery', 'pages.gallery')->name('gallery');
Route::view('/privacy-policy', 'pages.privacy')->name('privacy');
Route::view('/terms-and-conditions', 'pages.terms')->name('terms');
Route::view('/return-policy', 'pages.refund')->name('refund');

// Enrollment Routes
Route::get('/enroll', [EnrollmentController::class, 'create'])->name('enroll');
Route::post('/enroll', [EnrollmentController::class, 'store'])->name('enroll.store');

Route::get('/appointment', [AppointmentController::class, 'create'])->name('appointment');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/admin', function () {
    return redirect()->route('admin.list');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.authenticate');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/list', [EnrollmentController::class, 'index'])->name('admin.list');
        Route::post('/enrollments/{id}/status', [EnrollmentController::class, 'updateStatus'])->name('admin.status.update');
        
        Route::get('/appointments', [AppointmentController::class, 'index'])->name('admin.appointments');
        Route::post('/appointments/{id}/status', [AppointmentController::class, 'updateStatus'])->name('admin.appointments.update');
        Route::post('/appointments/{id}/details', [AppointmentController::class, 'updateAdvancedDetails'])->name('admin.appointments.details.update');

        Route::get('/clients', [\App\Http\Controllers\ReportController::class, 'clients'])->name('admin.clients');
        Route::get('/reports', [\App\Http\Controllers\ReportController::class, 'index'])->name('admin.reports');
        
        Route::get('/migrate', function () {
            \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
            return redirect()->back()->with('success', 'Database updated successfully on live server!');
        })->name('admin.migrate');

        Route::get('/clear-cache', function () {
            \Illuminate\Support\Facades\Artisan::call('view:clear');
            \Illuminate\Support\Facades\Artisan::call('route:clear');
            \Illuminate\Support\Facades\Artisan::call('config:clear');
            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            return redirect()->back()->with('success', 'আপডেটের পর ক্যাশ সফলভাবে ক্লিয়ার করা হয়েছে! (Cache Cleared)');
        })->name('admin.clear-cache');

        Route::post('/settings/update', [EnrollmentController::class, 'updateSettings'])->name('admin.settings.update');

        // CMS: Client Management & Advanced Enrollment
        Route::get('/clients/{whatsapp}', [\App\Http\Controllers\ReportController::class, 'clientProfile'])->name('admin.client.profile');
        Route::post('/enrollments/{id}/details', [EnrollmentController::class, 'updateAdvancedDetails'])->name('admin.enrollments.details.update');

        // Archive Separation
        Route::get('/archive/enrollments', [EnrollmentController::class, 'archive'])->name('admin.archive.enrollments');
        Route::get('/archive/appointments', [AppointmentController::class, 'archive'])->name('admin.archive.appointments');

        // Security (Admin)
        Route::get('/security', [AdminAuthController::class, 'security'])->name('admin.security');
        Route::post('/security/update', [AdminAuthController::class, 'updatePassword'])->name('admin.security.update');
    });
});

// User Portal (Login & Registration)
Route::get('/login', [\App\Http\Controllers\UserDashboardController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\UserDashboardController::class, 'login']);
Route::get('/register', [\App\Http\Controllers\UserDashboardController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\UserDashboardController::class, 'register'])->name('register.store');

// User Portal (Dashboard)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', [\App\Http\Controllers\UserDashboardController::class, 'settings'])->name('user.settings');
    Route::post('/settings/update', [\App\Http\Controllers\UserDashboardController::class, 'updatePassword'])->name('user.password.update');
    Route::post('/logout', [\App\Http\Controllers\AdminAuthController::class, 'logout'])->name('logout'); // Using same logout
});
