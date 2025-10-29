<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/', [UserController::class, 'index'])->name('users.index');

Route::patch('/users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
Route::patch('/users/{user}/desactivate', [UserController::class, 'desactivate'])->name('users.desactivate');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

//AQUI: eliminar