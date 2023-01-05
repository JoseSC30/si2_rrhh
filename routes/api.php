<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//
use App\Http\Controllers\UsuariomovilController;

//

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//http://localhost:8000/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
Route::get('/get_usuariomovils', [App\Http\Controllers\UsuariomovilController::class, 'enviarUsuariomovils']);
Route::get('/get_empleados', [App\Http\Controllers\UsuariomovilController::class, 'enviarEmpleados']);
Route::post('/post_empleados', [App\Http\Controllers\UsuariomovilController::class, 'buscarEmpleado']);
*/
Route::get('/get_comunicados', [App\Http\Controllers\ComunicadoController::class, 'enviarComunicados']);//API de prueba
Route::get('/get_sueldos', [App\Http\Controllers\SueldoController::class, 'enviarSueldos']);//API de prueba
Route::get('/get_permisos', [App\Http\Controllers\PermisolaboralController::class, 'enviarPermisos']);//API de prueba
Route::post('/post_permisos', [App\Http\Controllers\PermisolaboralController::class, 'registrarPermisos']);//API de prueba

Route::post('/post_llegada', [App\Http\Controllers\AsistenciaController::class, 'registrarLlegada']);//API de prueba
Route::post('/post_salida', [App\Http\Controllers\AsistenciaController::class, 'registrarSalida']);//API de prueba
Route::get('/get_asistencias', [App\Http\Controllers\AsistenciaController::class, 'registrosAsistencias']);//API de prueba
//
Route::post('login', [UsuariomovilController::class,'login']);
//
