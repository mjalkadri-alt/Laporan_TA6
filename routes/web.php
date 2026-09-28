<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Route::get('/laporan/form', [LaporanController::class, 'form'])->name('laporan.form');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
Route::get('/laporan/daftar', [LaporanController::class, 'daftar'])->name('laporan.daftar');
Route::get('/laporan/konfirmasi', [LaporanController::class, 'konfirmasi'])->name('laporan.konfirmasi');
