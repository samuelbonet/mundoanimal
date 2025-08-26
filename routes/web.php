<?php

use App\Http\Controllers\MundoanimalController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Auth\LoginController;

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

// Ruta que lleva a la vista de index
Route::get('/', [MundoanimalController::class, 'index']);

// Ruta que lleva a la vista servicios
Route::get('/servicios', [MundoanimalController::class, 'servicios']);

// Ruta que lleva a la vista de contacto
Route::get('contacto', [ContactoController::class, 'index'])->name("contacto");

// Ruta que lleva a la vista preguntas frecuentes
Route::get('/faq', [MundoanimalController::class, 'faq'])->name('faq');

// Ruta que envía la información del formulario de contacto 
Route::post('contacto/enviar', [ContactoController::class, 'enviar']);

// Ruta que manda mensaje de éxito
Route::get('contacto/exito', [ContactoController::class, 'exito'])->name("contacto.exito");

// Ruta para mostrar el formulario de login 
Route::get('/login', [LoginController::class, 'mostrarFormularioLogin'])->name('login');

// Ruta para acceder una vez logueado 
Route::post('/login', [LoginController::class, 'iniciarSesion']);

// Ruta para salir de sesión de un usuario
Route::post('/logout', [LoginController::class, 'cerrarSesion'])->name('logout');

// Ruta para llegar a la intranet y además proteger la ruta
Route::get('/intranet', function () {
    return view('/intranet');
})->middleware('auth');

// Ruta para cambiar la contraseña
Route::get('/cambiarContrasena', [App\Http\Controllers\UserController::class, 'cambiarContrasenaFormulario'])->middleware('auth')->name('password.change');

//Ruta para actualizar la contraseña cambiada
Route::post('/cambiarContrasena', [App\Http\Controllers\UserController::class, 'actualizarContrasena'])->middleware('auth')->name('password.update');






