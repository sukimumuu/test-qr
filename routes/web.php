<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/scan', function () {
    return view('admin.scan');
});

Route::post('/register', [RegistrationController::class, 'register'])->name('register');
Route::post('/verify-qr', [AdminController::class, 'verifyQrCode']);

Route::get('/form', [RegistrationController::class, 'form'])->name('form');


