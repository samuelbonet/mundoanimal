<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnvioContactoRequest;
use App\Mail\EnvioContacto;
use App\Models\MensajeFormulario;
use App\Services\PlantillaService;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    /**
     * Formulario de login
     */
    public function index(PlantillaService $plantilla)
    {
        $plantilla->setTitle('Contacto');
        return $plantilla->view("contacto/contacto");
    }

    /**
     * Formulario de login
     */
    public function enviar(EnvioContactoRequest $request)
    {
        //Envía un correo
        Mail::send(new EnvioContacto($request->validated()));
        //Guarda los datos en la tabla de la BBDD
        MensajeFormulario::create($request->validated());
        //Redirige al usuario a la vista contacto éxito
        return redirect()->route('contacto.exito');
    }

    /**
     * Éxito al enviar formulario de contacto
     */
    public function exito(PlantillaService $plantilla)
    {
        return $plantilla->view("contacto/contacto-exito");
    }
}
