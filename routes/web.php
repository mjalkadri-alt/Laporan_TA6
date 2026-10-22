<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Awal
|--------------------------------------------------------------------------
| Guest diarahkan ke halaman login, sedangkan user yang sudah login
| langsung diarahkan ke dashboard LaporBanjir.
*/
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
})->name('home');

/*
|--------------------------------------------------------------------------
| Area Terproteksi (wajib login)
|--------------------------------------------------------------------------
| Semua halaman LaporBanjir hanya bisa diakses setelah user melakukan
| login atau registrasi.
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LaporanController::class, 'dashboard'])->name('dashboard');

    Route::get('/laporan/form', [LaporanController::class, 'form'])->name('laporan.form');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/daftar', [LaporanController::class, 'daftar'])->name('laporan.daftar');
    Route::get('/laporan/konfirmasi', [LaporanController::class, 'konfirmasi'])->name('laporan.konfirmasi');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
