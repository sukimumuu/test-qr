<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\RegistrationController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/scan', function () {
    return view('admin.scan');
});
Route::post('/register', [RegistrationController::class, 'register'])->name('register');
Route::post('/paymentHandler', [RegistrationController::class, 'paymentHandler'])->name('paymentHandler');
Route::post('/verify-qr', [AdminController::class, 'verifyQrCode']);

Route::get('/', [RegistrationController::class, 'form'])->name('form');
Route::get('/hasilScan', [RegistrationController::class, 'hasilScan'])->name('hasilScan');
Route::get('/registration-success', [RegistrationController::class, 'registrationSuccess'])->name('registration-success');
Route::get('/registration-failed', [RegistrationController::class, 'registrationFailed'])->name('registration-failed');


