<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inventario', [InventarioController::class, 'index'])
    ->middleware('auth')
    ->name('inventario.index');

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/inventario/create', [InventarioController::class, 'create'])
    ->name('inventario.create');
Route::Post('/inventario', [InventarioController::class, 'store'])
    ->name('inventario.store');