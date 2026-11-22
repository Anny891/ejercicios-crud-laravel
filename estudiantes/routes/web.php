<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\LoginController;

Route::redirect('/', 'login');

Route::get('/estudiante', [EstudianteController::class, 'index'])
    ->name('estudiante.index');

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/estudiante/create', [EstudianteController::class, 'create'])
    ->name('estudiante.create');
Route::post('/estudiante', [EstudianteController::class, 'store'])
     ->name('estudiante.store');
