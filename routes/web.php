<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\modificarEstadoController;
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
    return view('welcome');
});

Auth::routes();

Route::resource('/carrera', CarreraController::class,['middleware'=>'auth']);
Route::resource('modificarEstado',modificarEstadoController::class,['middleware' => 'auth']);

Route::get('cambiarContrasena', 'App\Http\Controllers\cambiarContrasenaController@index');
Route::post('cambiarContrasena', 'App\Http\Controllers\cambiarContrasenaController@store')->name('change.password');

Route::get('/usuario','App\Http\Controllers\administrarUsuarioController@index');

Route::get('/crearUsuario','App\Http\Controllers\crearUsuarioController@index');
Route::post('crearUsuario', 'App\Http\Controllers\crearUsuarioController@crearUsuario')->name('crear.Usuario');

Route::get('/buscarEstudiante','App\Http\Controllers\buscarEstudianteController@index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/modificarEstado', 'App\Http\Controllers\modificarEstadoController@index');
Route::get('/DeshabilitarUsuarioController', [App\Http\Controllers\DeshabilitarUsuarioController::class, 'deshabilitarUsuario'])->name('cambiarEstado');
Route::get('/lista-usuarios-editar','App\Http\Controllers\listaUsuarioController@index');
Route::get('/lista-usuarios-editar/editar','App\Http\Controllers\listaUsuarioController@editar')->name('editarUsuario');
Route::put('/lista-usuarios-editar/editar','App\Http\Controllers\listaUsuarioController@update')->name('actualizar.datos');
Route::get('/RestablecerContraseñaController', [App\Http\Controllers\ReestablecerContraseñaController::class, 'reestablecerContraseña'])->name('reestablecerCont');
