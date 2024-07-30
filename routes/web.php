<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\UserController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::group(['middleware' => 'auth:karyawan'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Karyawan Routes
    Route::resource('karyawan', KaryawanController::class);

    // Pinjaman Routes
    Route::resource('pinjaman', PinjamanController::class);

    // Simpanan Routes
    Route::resource('simpanan', SimpananController::class);

    // Tabungan Routes
    Route::resource('tabungan', TabunganController::class);

    // Angsuran Routes
    Route::resource('angsuran', AngsuranController::class);

    Route::resource('user', UserController::class);

});
