<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuardianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Default welcome route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('auth')->group(function () {
    // Registration
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register.submit');

    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login.form');
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:5,1')
        ->name('auth.login.submit');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // Forgot Password
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('auth.password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('auth.password.email');

    // Reset Password
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('auth.password.update');
});

/*
|--------------------------------------------------------------------------
| Email Verification Routes
|--------------------------------------------------------------------------
*/
Route::get('/email/verify', function () {
    return view('emails.verify-notice');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/confirmation', function () {
    return view('emails.verified');
})->middleware('auth')->name('verification.confirmation');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

// Dashboard (protected by auth + verified middleware)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Guardians CRUD Routes (Grouped)
|--------------------------------------------------------------------------
*/
Route::prefix('guardians')->middleware(['auth', 'verified'])->group(function () {
    // List guardians
    Route::get('/', [GuardianController::class, 'index'])->name('guardians.index');

    // Create guardian
    Route::get('/create', [GuardianController::class, 'create'])->name('guardians.create');
    Route::post('/', [GuardianController::class, 'store'])->name('guardians.store');

    // Show guardian
    Route::get('/{id}', [GuardianController::class, 'show'])->name('guardians.show');

    // Edit guardian
    Route::get('/{id}/edit', [GuardianController::class, 'edit'])->name('guardians.edit');
    Route::put('/{id}', [GuardianController::class, 'update'])->name('guardians.update');

    // Create child under guardian
    Route::get('/{id}/create-child', [GuardianController::class, 'createChild'])->name('guardians.create-child');

    // Soft delete guardian
    Route::delete('/{id}', [GuardianController::class, 'destroy'])->name('guardians.destroy');
});

/*
|--------------------------------------------------------------------------
| Static Archive Child Flow (Preview Only)
|--------------------------------------------------------------------------
*/
// Static Archive Child Flow (Preview Only)
Route::get('/child/archive', function () {
    return view('guardians.archive-child'); // <-- include folder name
})->middleware(['auth', 'verified'])->name('child.archive.view');
