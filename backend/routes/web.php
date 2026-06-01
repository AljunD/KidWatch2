<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\ProgressController;

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

    // Forgot / Reset Password
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('auth.password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('auth.password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('auth.password.reset');
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
| Dashboard (Teacher-only)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'teacher'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Guardians Routes (Teacher-only)
|--------------------------------------------------------------------------
*/
Route::prefix('guardians')->middleware(['auth', 'verified', 'teacher'])->group(function () {
    Route::get('/', [GuardianController::class, 'index'])->name('guardians.index');
    Route::get('/create', [GuardianController::class, 'create'])->name('guardians.create');
    Route::post('/', [GuardianController::class, 'store'])->name('guardians.store');
    Route::get('/{id}', [GuardianController::class, 'show'])->name('guardians.show');
    Route::get('/{id}/edit', [GuardianController::class, 'edit'])->name('guardians.edit');
    Route::put('/{id}', [GuardianController::class, 'update'])->name('guardians.update');
    Route::get('/{id}/create-child', [GuardianController::class, 'createChild'])->name('guardians.create-child');
    Route::delete('/{id}', [GuardianController::class, 'destroy'])->name('guardians.destroy');
});

/*
|--------------------------------------------------------------------------
| Archive Child Flow (Static Preview)
|--------------------------------------------------------------------------
*/
Route::get('/child/archive', function () {
    return view('guardians.archive-child');
})->middleware(['auth', 'verified', 'teacher'])->name('child.archive.view');

/*
|--------------------------------------------------------------------------
| Children Routes (Static Preview)
|--------------------------------------------------------------------------
*/
Route::prefix('childs')->middleware(['auth', 'verified', 'teacher'])->group(function () {
    Route::get('/', function () {
        return view('childs.index'); 
    })->name('childs.index');

    Route::get('/show', function () {
        return view('childs.show'); 
    })->name('childs.show');

    Route::get('/edit', function () {
        return view('childs.edit'); 
    })->name('childs.edit');
});

/*
|--------------------------------------------------------------------------
| Progress Routes (Static Preview)
|--------------------------------------------------------------------------
*/
Route::prefix('progress')->middleware(['auth','verified','teacher'])->group(function () {
    Route::get('/', function () {
        return view('progress.index');
    })->name('progress.index');

    Route::get('/select-domain', function () {
        return view('progress.select-domain');
    })->name('progress.select-domain');

    Route::get('/create', function () {
        return view('progress.create');
    })->name('progress.create');

    Route::get('/show', function () {
        return view('progress.show');
    })->name('progress.show');

    Route::get('/edit', function () {
        return view('progress.edit');
    })->name('progress.edit');
});

/*
|--------------------------------------------------------------------------
| Static System Logs & Archive (placeholders)
|--------------------------------------------------------------------------
*/
Route::get('/logs', function () {
    return view('logs.index'); // placeholder view
})->middleware(['auth','verified','teacher'])->name('logs.static');

Route::get('/archive', function () {
    return view('archive.index'); // placeholder view
})->middleware(['auth','verified','teacher'])->name('archive.static');
