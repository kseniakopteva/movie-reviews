<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthController::class, 'loginShow'])->name('login.show');
    Route::get('register', [AuthController::class, 'registerShow'])->name('register.show');

    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [ReviewController::class, 'index'])->name('dashboard');

    Route::get('review/create', [ReviewController::class, 'create'])->name('review.create');
    Route::post('review/store', [ReviewController::class, 'store'])->name('review.store');
    Route::get('review/{review:slug}/edit', [ReviewController::class, 'edit'])->name('review.edit');
    Route::patch('review/{review:slug}/update', [ReviewController::class, 'update'])->name('review.update');

    Route::delete('review/{review:slug}/delete', [ReviewController::class, 'destroy'])->name('review.delete');
});

Route::get('/debug-log', function () {
    return nl2br(file_get_contents(storage_path('logs/laravel.log')));
});
