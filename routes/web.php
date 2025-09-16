<?php

use App\Http\Controllers\IntranetController;
use App\Http\Controllers\MundoanimalController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;

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

// Ruta que manda mensaje de éxito del formulario de contacto
Route::get('contacto/exito', [ContactoController::class, 'exito'])->name("contacto.exito");

/*
|--------------------------------------------------------------------------
| Formulario de login
|--------------------------------------------------------------------------
*/

// Ruta para mostrar el formulario de login 
Route::get('/login', [LoginController::class, 'mostrarFormularioLogin'])->name('login');

// Ruta para acceder una vez logueado 
Route::post('/login', [LoginController::class, 'iniciarSesion']);

// Ruta para salir de sesión de un usuario
Route::post('/logout', [LoginController::class, 'cerrarSesion'])->name('logout');

/*
|--------------------------------------------------------------------------
| Intranet
|--------------------------------------------------------------------------
*/

// Ruta para llegar a la intranet y además proteger la ruta
Route::get('/intranet', function () {
    return view('/intranet');
})->middleware('auth');

// Ruta para cambiar la contraseña del usuario
Route::get('/cambiarContrasena', [App\Http\Controllers\UserController::class, 'cambiarContrasenaFormulario'])->middleware('auth')->name('password.change');

//Ruta para actualizar la contraseña cambiada del usuario
Route::post('/cambiarContrasena', [App\Http\Controllers\UserController::class, 'actualizarContrasena'])->middleware('auth')->name('password.update');

/*
|--------------------------------------------------------------------------
| Gestión de clientes
|--------------------------------------------------------------------------
*/

//Formulario de registro de cliente
Route::get('/gestionClientes', function () {
    return view('intranet.gestionClientesFormulario');
})->name('gestionClientes');

// Mostrar formulario para registrar
Route::get('/clientes/crear', [ClienteController::class, 'create'])->name('clientes.create');

// Guardar cliente
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

//Ver listado de clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

// Editar cliente
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

// Eliminar cliente
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

/*
|--------------------------------------------------------------------------
| Gestión de mascotas
|--------------------------------------------------------------------------


Route::get('/gestionMascotas', [MascotaController::class, 'create'])->name('gestionMascotas'); // Formulario
Route::post('/mascotas', [MascotaController::class, 'store'])->name('mascotas.store'); // Guardar

Route::get('/mascotas', [MascotaController::class, 'index'])->name('mascotas.index'); // Listado
Route::get('/mascotas/{mascota}/edit', [MascotaController::class, 'edit'])->name('mascotas.edit'); // Editar
Route::delete('/mascotas/{mascota}', [MascotaController::class, 'destroy'])->name('mascotas.destroy'); // Eliminar
*/

/*
|--------------------------------------------------------------------------
| Gestión de historial
|--------------------------------------------------------------------------
*/

//Formulario de registro de historial clinico
Route::get('/historial', function () {
    return view('intranet.historialClinicoFormulario');
})->name('historial');

//Tabla de historial clinico
Route::get('/gestionHistorial', function () {
    return view('intranet.historialClinicoTabla');
})->name('gestionHistorial');

/*
|--------------------------------------------------------------------------
| Gestión de citas
|--------------------------------------------------------------------------
*/

//Formulario de eestión de citas
Route::get('/citas', function () {
    return view('intranet.citasFormulario');
})->name('citas');

//Tabla de gestión de citas
Route::get('/gestionCitas', function () {
    return view('intranet.citasTabla');
})->name('gestionCitas');

/*
|--------------------------------------------------------------------------
| Gestión de peluqueria
|--------------------------------------------------------------------------
*/

//Formulario de gestión de peluqueria
Route::get('/peluqueria', function () {
    return view('intranet.peluqueriaFormulario');
})->name('peluqueria');

//Tabla de gestión de peluqueria
Route::get('/gestionPeluqueria', function () {
    return view('intranet.peluqueriaTabla');
})->name('gestionPeluqueria');

/*
|--------------------------------------------------------------------------
| Gestión de facturas
|--------------------------------------------------------------------------
*/

//Formulario de gestión de facturas
Route::get('/facturas', function () {
    return view('intranet.facturasFormulario');
})->name('facturas');

//Tabla de gestión de facturas
Route::get('/gestionFacturas', function () {
    return view('intranet.facturasTabla');
})->name('gestionFacturas');





















