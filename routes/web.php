<?php

use App\Http\Controllers\MundoanimalController;
use App\Http\Controllers\ContactoController;

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

// Ruta por defecto que lleva a la página principal
Route::get('/' , [MundoanimalController::class,'index']);
Route::get('/servicios' , [MundoanimalController::class,'servicios']);
Route::get('/faq', [MundoanimalController::class, 'faq'])->name('faq');


// Rutas relacionadas con el formulario de contacto
Route::get('contacto' , [ContactoController::class,'index'])->name("contacto");
Route::post('contacto/enviar' , [ContactoController::class,'enviar']);
Route::get('contacto/exito' , [ContactoController::class,'exito'])->name("contacto.exito");




