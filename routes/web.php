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


//Rutas PDF
Route::get('empleados/pdf', [App\Http\Controllers\EmpleadoController::class, 'pdf'])->name('empleados.pdf');
Route::get('contratos/pdf', [App\Http\Controllers\ContratoController::class, 'pdf'])->name('contratos.pdf');
Route::get('planillasueldos/pdf', [App\Http\Controllers\PlanillasueldoController::class, 'pdf'])->name('planillasueldos.pdf');

//Rutas
Route::resource('rols', App\Http\Controllers\RolController::class);
Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('horarios', App\Http\Controllers\HorarioController::class);
Route::resource('tipocontratos', App\Http\Controllers\TipocontratoController::class);
Route::resource('estado-contratos', App\Http\Controllers\EstadoContratoController::class);
Route::resource('turnos', App\Http\Controllers\TurnoController::class);
Route::resource('contratos', App\Http\Controllers\ContratoController::class);
Route::resource('bitacoras', App\Http\Controllers\BitacoraController::class);

Route::resource('recursos', App\Http\Controllers\RecursoController::class);
Route::resource('puestolaborals', App\Http\Controllers\PuestolaboralController::class);
Route::resource('recursoasignados', App\Http\Controllers\RecursoasignadoController::class);


Route::resource('contactos', App\Http\Controllers\ContactoController::class);
Route::resource('planillasueldos', App\Http\Controllers\PlanillasueldoController::class);
Route::resource('usuariomovils', App\Http\Controllers\UsuariomovilController::class);
Route::resource('asistencias', App\Http\Controllers\AsistenciaController::class);
Route::resource('permisolaborals', App\Http\Controllers\PermisolaboralController::class);

