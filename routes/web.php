<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Pagina de inicio
Route::get('/', function () {
    return view('welcome');
});

//Rutas de atenticacion
Auth::routes();

//Pagina del home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas del modelo usuario
Route::prefix('users')->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('users.index');

    Route::patch('/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
    Route::patch('/{user}/desactivate', [UserController::class, 'desactivate'])->name('users.desactivate');

    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update');

    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});

//Rutas del modelo articulo
Route::resource('articles', ArticleController::class);