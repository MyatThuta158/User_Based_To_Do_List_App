<?php

use App\Http\Controllers\AppUserController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AppUserController::class, 'index']);
Route::post('/register', [AppUserController::class, 'register'])->name('register');
