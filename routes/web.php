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
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\JabatanController;

Route::resource('departemen', DepartemenController::class);
Route::resource('jabatan', JabatanController::class);

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::group(['middleware' ], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Karyawan Routes
    Route::resource('karyawan', KaryawanController::class);
    Route::get('export-pdf-karyawan', [KaryawanController::class,'exportPDF'])->name('export.pdf.karyawan');

    // Pinjaman Routes
    Route::resource('pinjaman', PinjamanController::class);
    Route::get('export-pdf-pinjaman', [PinjamanController::class,'exportPDF'])->name('export.pdf.pinjaman');

    // Simpanan Routes
    Route::resource('simpanan', SimpananController::class);
     Route::get('export-pdf-simpanan', [SimpananController::class,'exportPDF'])->name('export.pdf.simpanan');
    // Tabungan Routes
    Route::resource('tabungan', TabunganController::class);
    Route::get('export-pdf-tabungan', [TabunganController::class,'exportPDF'])->name('export.pdf.tabungan');
    // Angsuran Routes
    Route::resource('angsuran', AngsuranController::class);
    Route::get('export-pdf-angsuran', [AngsuranController::class,'exportPDF'])->name('export.pdf.angsuran');

    Route::resource('user', UserController::class);

});
