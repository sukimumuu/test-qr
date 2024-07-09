<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/sent', function () {
    return view('auth.email-sent');
});
Route::get('/scan', function () {
    return view('admin.scan');
});
Route::get('/hasilScan/{id}', [RegistrationController::class, 'hasilScan'])->name('hasilScan');
Route::post('/verify-qr', [AdminController::class, 'verifyQrCode']);
Route::get('/alpha-registration', function(){
    return view('auth.regis');
});
Route::post('/storing-user', [RegistrationController::class, 'alphaReg'])->name('storing-users');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/login', function(){
    return "INI ADALAH LOGIN";
})->name('login');
Route::post('/cek', function(Request $request){
    if (Auth::attempt($request->only('email','password'))) {
        return redirect()->route('form');
    }
    return back();
})->name('cek');

Route::get('/logout', function(){
    Auth::logout();
})->name('logout');

Route::post('/paymentHandler', [RegistrationController::class, 'paymentHandler'])->name('paymentHandler');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/register', [RegistrationController::class, 'register'])->name('register');
    Route::get('/dapatkan/kabupaten/{provId}', [RegionController::class, 'getKabupaten']);
    Route::get('/dapatkan/kecamatan/{kecId}', [RegionController::class, 'getKecamatan']);
    Route::get('/', [RegistrationController::class, 'form'])->name('form');
    Route::get('/registration-success', [RegistrationController::class, 'registrationSuccess'])->name('registration-success');
    Route::get('/registration-failed', [RegistrationController::class, 'registrationFailed'])->name('registration-failed');
});


