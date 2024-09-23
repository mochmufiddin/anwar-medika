<?php

use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReceiptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/examination', [ExaminationController::class, 'index'])->name('examination');
    Route::get('/examination/add', [ExaminationController::class, 'add'])->name('examination.add');
    Route::post('/examination/create', [ExaminationController::class, 'create'])->name('examination.create');
    Route::get('/examination/{id}', [ExaminationController::class, 'show'])->name('examination.show');
    Route::get('/examination/{id}/edit', [ExaminationController::class, 'edit'])->name('examination.edit');
    Route::post('/examination/{id}/update', [ExaminationController::class, 'update'])->name('examination.update');

    Route::get('/receipt', [ReceiptController::class, 'index'])->name('receipt');
    Route::get('/receipt/{id}', [ReceiptController::class, 'show'])->name('receipt.show');
    Route::get('/receipt/{id}/edit', [ReceiptController::class, 'edit'])->name('receipt.edit');
    Route::post('/receipt/{id}/process', [ReceiptController::class, 'process'])->name('receipt.process');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
