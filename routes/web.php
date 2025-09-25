<?php

use App\Http\Controllers\MundoanimalController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IntranetController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PeluqueriaController;
use App\Http\Controllers\FacturaController;


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


Route::get('/intranet', [IntranetController::class, 'index'])->name('intranet');


// Ruta para cambiar la contraseña del usuario
Route::get('/cambiarContrasena', [App\Http\Controllers\UserController::class, 'cambiarContrasenaFormulario'])->middleware('auth')->name('password.change');

//Ruta para actualizar la contraseña cambiada del usuario
Route::post('/cambiarContrasena', [App\Http\Controllers\UserController::class, 'actualizarContrasena'])->middleware('auth')->name('password.update');

/*
|--------------------------------------------------------------------------
| Gestión de clientes
|--------------------------------------------------------------------------
*/

// Mostrar formulario para registrar
Route::get('/clientes/crear', [ClienteController::class, 'create'])->name('clientes.create');

// Guardar cliente
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

//Ver listado de clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

// Editar cliente
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

// Actualizar cliente
Route::post('/clientes/{cliente}/update', [ClienteController::class, 'update'])->name('clientes.update');

// Eliminar cliente
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

/*
|--------------------------------------------------------------------------
| Gestión de mascotas
|--------------------------------------------------------------------------
*/

// Mostrar formulario para registrar
Route::get('/gestionMascotas', [MascotaController::class, 'create'])->name('gestionMascotas'); 

// Guardar cliente
Route::post('/mascotas', [MascotaController::class, 'store'])->name('mascotas.store'); 

//Ver listado de clientes
Route::get('/mascotas', [MascotaController::class, 'index'])->name('mascotas.index');

// Editar cliente
Route::get('/mascotas/{mascota}/edit', [MascotaController::class, 'edit'])->name('mascotas.edit'); 

// Actualizar cliente
Route::post('/mascotas/{mascota}/update', [MascotaController::class, 'update'])->name('mascotas.update');

// Eliminar cliente
Route::delete('/mascotas/{mascota}', [MascotaController::class, 'destroy'])->name('mascotas.destroy'); 

/*
|--------------------------------------------------------------------------
| Gestión de historial
|--------------------------------------------------------------------------
*/

// Mostrar formulario para registrar
Route::get('/gestionHistorial', [HistorialController::class, 'create'])->name('gestionHistorial'); // Formulario

// Guardar historial clínico
Route::post('/historial', [HistorialController::class, 'store'])->name('historial.store'); // Guardar

//Ver listado de historial clínico
Route::get('/historial', [HistorialController::class, 'index'])->name('historial.index'); // Listado

// Editar historial clínico
Route::get('/historial/{historial}/edit', [HistorialController::class, 'edit'])->name('historial.edit'); // Editar

// Actualizar historial clínico
Route::post('/historial/{historial}/update', [HistorialController::class, 'update'])->name('historial.update');

// Eliminar historial clínico
Route::delete('/historial/{historial}', [HistorialController::class, 'destroy'])->name('historial.destroy'); // Eliminar

/*
|--------------------------------------------------------------------------
| Gestión de citas
|--------------------------------------------------------------------------
*/

// Ver listado de citas
Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');

// Mostrar formulario para registrar
Route::get('/citas/gestionCita', [CitaController::class, 'create'])->name('citas.create');

// Guardar cita
Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');

// Editar cita
Route::get('/citas/{cita}/edit', [CitaController::class, 'edit'])->name('citas.edit');

// Actualizar cita
Route::put('/citas/{cita}', [CitaController::class, 'update'])->name('citas.update');

// Eliminar cita
Route::delete('/citas/{cita}', [CitaController::class, 'destroy'])->name('citas.destroy');


/*
|--------------------------------------------------------------------------
| Gestión de peluqueria
|--------------------------------------------------------------------------
*/

// Mostrar formulario para registrar
Route::get('/gestionPeluqueria', [PeluqueriaController::class, 'create'])->name('peluqueria.create');

// Guardar cita peluqueria
Route::post('/peluqueria', [PeluqueriaController::class, 'store'])->name('peluqueria.store');

//Ver listado de citas peluqueria
Route::get('/peluqueria', [PeluqueriaController::class, 'index'])->name('peluqueria.index');

// Editar cita peluqueria
Route::get('/peluqueria/{peluqueria}/editar', [PeluqueriaController::class, 'edit'])->name('peluqueria.edit');

// Actualizar cita peluqueria
Route::post('/peluqueria/{peluqueria}/actualizar', [PeluqueriaController::class, 'update'])->name('peluqueria.update');

// Eliminar cita peluquería
Route::delete('/peluqueria/{peluqueria}', [PeluqueriaController::class, 'destroy'])->name('peluqueria.destroy');

/*
|--------------------------------------------------------------------------
| Gestión de facturas
|--------------------------------------------------------------------------
*/

// Mostrar formulario para registrar
Route::get('gestionFactura', [FacturaController::class, 'create'])->name('facturas.create');

// Guardar factura
Route::post('/facturas', [FacturaController::class, 'store'])->name('facturas.store');

//Ver listado de facturas
Route::get('/facturas', [FacturaController::class, 'index'])->name('facturas.index');

// Editar factura
Route::get('/facturas/{factura}/editar', [FacturaController::class, 'edit'])->name('facturas.edit');

// Actualizar factura
Route::post('/facturas/{factura}/actualizar', [FacturaController::class, 'update'])->name('facturas.update');

// Eliminar factura
Route::delete('/facturas/{factura}', [FacturaController::class, 'destroy'])->name('facturas.destroy');

// Generar PDF de una factura
Route::get('/facturas/{factura}/pdf', [FacturaController::class, 'generatePDF'])->name('facturas.pdf');




















