<?php

use App\Http\Controllers\AppUserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//-----This is login routes-----//
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.submit');

//---------This is for register routes----//
Route::get('/register', [AppUserController::class, 'index']);
Route::post('/register', [AppUserController::class, 'register'])->name('register');
