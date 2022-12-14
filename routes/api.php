<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/http://localhost:8000/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_usuariomovils', [App\Http\Controllers\UsuariomovilController::class, 'enviarUsuariomovils']);//Obtiene todos los usuariomovils.
Route::get('/get_empleados', [App\Http\Controllers\UsuariomovilController::class, 'enviarEmpleados']);//Obtiene todos los empleados.


Route::post('/post_empleados', [App\Http\Controllers\UsuariomovilController::class, 'buscarEmpleado']);//Obtiene un empleado en especifico.