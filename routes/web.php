<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('/create', [PasienController::class, 'create'])->name('pasien.create');
    Route::post('/', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::put('/{id}', [PasienController::class, 'update'])->name('pasien.update');
    Route::delete('/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
    Route::get('/{id}/label', [PasienController::class, 'label'])->name('pasien.label');
});
