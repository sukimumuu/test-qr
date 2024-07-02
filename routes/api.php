<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::post('/paymentHandler', [RegistrationController::class, 'paymentHandler'])->name('paymentHandler');

