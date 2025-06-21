<?php

use App\Http\Controllers\AppUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ToDoListsController;
use Illuminate\Support\Facades\Route;

//-----This is login routes-----//
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.submit');

//---------This is for register routes----//
Route::get('/register', [AppUserController::class, 'index']);
Route::post('/register', [AppUserController::class, 'register'])->name('register');

//Route::get('/todolists', [ToDoListsController::class, 'showMain'])->name('mainpage');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logOut'])->name('logout');
    Route::get('/todolists', [ToDoListsController::class, 'showMain'])->name('mainpage');
    Route::post('/todolists', [ToDoListsController::class, 'store'])->name('todolsits.store');
    Route::delete('/todolists/{id}', [ToDoListsController::class, 'delete'])->name('todolsits.delete');

});
