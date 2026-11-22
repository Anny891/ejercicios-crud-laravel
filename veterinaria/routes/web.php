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

Route::get('/mascota/create', [MascotaController::class, 'create'])
    ->name('mascota.create');
Route::post('/mascota', [MascotaController::class, 'store'])
    ->name('mascota.store');

Route::get('/mascota/{id}/edit', [MascotaController::class, 'edit'])
    ->name('mascota.edit');
Route::put('/mascota/{id}', [MascotaController::class, 'update'])
    ->name('mascota.update');

Route::delete('/mascota/{id}', [MascotaController::class, 'destroy'])
    ->name('mascota.destroy');