<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\crearUsuarioController;
use App\Http\Controllers\modificarEstadoController;
use App\Http\Controllers\solicitudAlumnoController;
use App\Http\Controllers\buscarEstudianteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
})->middleware('auth');

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::resource('/carrera', CarreraController::class,['middleware'=>'auth']);

Route::resource('modificarEstado',modificarEstadoController::class,['middleware' => 'auth']);
Route::get('cambiarContrasena', 'App\Http\Controllers\cambiarContrasenaController@index');
Route::post('cambiarContrasena', 'App\Http\Controllers\cambiarContrasenaController@store')->name('change.password');

Route::get('/usuario','App\Http\Controllers\administrarUsuarioController@index');

Route::get('/crearUsuario','App\Http\Controllers\crearUsuarioController@index');
Route::post('crearUsuario', 'App\Http\Controllers\crearUsuarioController@crearUsuario')->name('crear.Usuario');


//Resolver solicitudes pendientes
Route::get('/resolverSolicitud','App\Http\Controllers\resolverSolicitudController@index');
Route::get('/responderSolicitud','App\Http\Controllers\resolverSolicitudController@resolverSolicitud')->name('responderSolicitud');
Route::put('/responderSolicitud','App\Http\Controllers\resolverSolicitudController@update')->name('actualizarSolicitud');
Route::get('/download/{archivo}', 'App\Http\Controllers\DescargarArchivosController@download');

//ver datos de estudiante
Route::resource('/buscarEstudiante',buscarEstudianteController::class,['middleware'=>'auth']);
Route::get('/buscarEstudiante','App\Http\Controllers\buscarEstudianteController@index')->name('buscarEstudiante');
Route::get('/revisarDatos','App\Http\Controllers\buscarEstudianteController@verDatos')->name('verDatos');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/modificarEstado', 'App\Http\Controllers\modificarEstadoController@index');
Route::get('/DeshabilitarUsuarioController', [App\Http\Controllers\DeshabilitarUsuarioController::class, 'deshabilitarUsuario'])->name('cambiarEstado');
Route::get('/lista-usuarios-editar','App\Http\Controllers\editarUsuarioController@index');
Route::get('/lista-usuarios-editar/editar','App\Http\Controllers\editarUsuarioController@editar')->name('editarUsuario');
Route::put('/lista-usuarios-editar/editar','App\Http\Controllers\editarUsuarioController@update')->name('actualizar.datos');
Route::get('/RestablecerContraseñaController', [App\Http\Controllers\ReestablecerContraseñaController::class, 'reestablecerContraseña'])->name('reestablecerCont');


Route::get('/solicitud-alumno','App\Http\Controllers\solicitudAlumnoController@index');
Route::get('/solicitud-alumno/create','App\Http\Controllers\solicitudAlumnoController@Solicitud');
Route::post('/solicitud-alumno/create','App\Http\Controllers\solicitudAlumnoController@Solicitud')->name('tipoSolicitud');
Route::put('/solicitud-alumno/create/success','App\Http\Controllers\solicitudAlumnoController@create')->name('solicitudAlumno.create');
Route::get('/solicitud-alumno/lista', 'App\Http\Controllers\solicitudAlumnoController@show')->name('solictudAlumno.vistaSolicitud');
Route::get('/solicitud-alumno/lista/create','App\Http\Controllers\solicitudAlumnoController@index')->name('nuevaSolicitud');
Route::get('/solicitud-alumno/lista/edit', 'App\Http\Controllers\solicitudAlumnoController@edit')->name('solicitud.edit');
Route::post('/solicitud-alumno/lista/edit', 'App\Http\Controllers\solicitudAlumnoController@edit')->name('editarSolicitud');
Route::get('/solicitud-alumno/buscarSolicitud', 'App\Http\Controllers\solicitudAlumnoController@update')->name('vistaSolicitud');
Route::put('/solicitud-alumno/lista/edit','App\Http\Controllers\solicitudAlumnoController@update')->name('alumnoUpdateSolicitud');



// esto es para la carga de excel
Route::get('/cargamasiva','App\Http\Controllers\crearUsuarioController@importForm');
Route::post('import-list-excel','App\Http\Controllers\crearUsuarioController@importExcel')->name('users.import.excel');

