<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginContoller;
use App\Http\Controllers\TareaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tarea', [TareaController::class, 'index'])
    ->middleware('auth')
    ->name('tarea.index');

Route::get('/login', [LoginContoller::class, 'showLogin'])
    ->name('login');
Route::post('/login', [LoginContoller::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [LoginContoller::class, 'logout'])
    ->name('logout');

Route::get('/tarea/create', [TareaController::class, 'create'])
    ->middleware('auth')
    ->name('tarea.create');
Route::post('/tarea', [TareaController::class, 'store'])
    ->name('tarea.store');

Route::get('/tarea/{id}/edit', [TareaController::class, 'edit'])
    ->middleware('auth')
    ->name('tarea.edit');
Route::put('/tarea/{id}', [TareaController::class, 'update'])
    ->name('tarea.update');