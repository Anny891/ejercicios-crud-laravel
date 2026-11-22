<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\LoginController;

Route::redirect('/', 'login');

Route::get('/mascota', [MascotaController::class, 'index'])
    ->middleware('auth')
    ->name('mascota.index');

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');
Route::post('/login', [LoginController::class, 'login'])
    ->name('login');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');
