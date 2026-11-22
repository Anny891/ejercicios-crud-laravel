<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/libro', [LibroController::class, 'index'])
    ->middleware('auth')
    ->name('libro.index');

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name ('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/libro/create', [LibroController::class, 'create'])
    ->middleware('auth')
    ->name('libro.create');
Route::post('/libro', [LibroController::class, 'store'])
    ->name('libro.store');