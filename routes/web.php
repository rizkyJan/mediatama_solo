<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminVideoController;
use App\Http\Controllers\AdminVideoRequestController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('customer.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==========================================
// RUTE KHUSUS ADMIN
// ==========================================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('customers', AdminCustomerController::class)->except(['show']);
    Route::resource('videos', AdminVideoController::class)->except(['show']);
    Route::resource('requests', AdminVideoRequestController::class)->only(['index', 'edit', 'update']);
});

// ==========================================
// RUTE KHUSUS CUSTOMER
// ==========================================
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\CustomerController::class, 'index'])->name('dashboard');
    Route::post('/request/{videoId}', [\App\Http\Controllers\CustomerController::class, 'requestVideo'])->name('request');
    Route::get('/watch/{videoId}', [\App\Http\Controllers\CustomerController::class, 'watchVideo'])->name('watch');
});

// Bawaan Breeze untuk Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
