<?php

use App\Http\Controllers\ExaminationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/examination', [ExaminationController::class, 'index'])->name('examination');
    Route::get('/examination/add', [ExaminationController::class, 'add'])->name('examination.add');
    Route::post('/examination/create', [ExaminationController::class, 'create'])->name('examination.create');
    Route::get('/examination/edit', [ExaminationController::class, 'add'])->name('examination.edit');
    Route::post('/examination/update', [ExaminationController::class, 'create'])->name('examination.update');

    Route::get('/receipt', function () {
        return view('dashboard');
    })->name('receipt');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
