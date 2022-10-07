<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas
Route::resource('rols', App\Http\Controllers\RolController::class);
Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('chau1', App\Http\Controllers\UserController::class);
Route::resource('chau3', App\Http\Controllers\UserController::class);
Route::resource('chau4', App\Http\Controllers\UserController::class);
Route::resource('chau2', App\Http\Controllers\UserController::class);
Route::resource('chau7', App\Http\Controllers\UserController::class);
Route::resource('chau8', App\Http\Controllers\UserController::class);