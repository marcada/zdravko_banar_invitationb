<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Главна страна: прикажи ја формата за покана
Route::middleware('auth')->group(function () {
    Route::get('/', [InvitationController::class, 'create'])->name('home');
    Route::post('/generate-invitation', [InvitationController::class, 'generate'])->name('invitation.generate');
});

// Страница по login (опционално)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Профил рути (default Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth систем
require __DIR__.'/auth.php';
