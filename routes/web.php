<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\RegistrationController;

Route::get('/qr', function () {
    return view('emails.qrcode');
});
Route::get('/scan', function () {
    return view('admin.scan');
});

Route::post('/register', [RegistrationController::class, 'register'])->name('register');
Route::post('/verify-qr', [AdminController::class, 'verifyQrCode']);

Route::get('/', [RegistrationController::class, 'form'])->name('form');
Route::get('/hasilScan/{id}', [RegistrationController::class, 'hasilScan'])->name('hasilScan');
Route::get('/pembayaranBerhasil', [RegistrationController::class, 'pembayaranBerhasil'])->name('pembayaranBerhasil');
Route::get('/pembayaranGagal', [RegistrationController::class, 'pembayaranGagal'])->name('pembayaranGagal');


