<?php

namespace App\Http\Controllers;

use App\Services\PlantillaService;
use Illuminate\Http\Request;

class MundoanimalController extends Controller
{
    /**
     * Carga la vista index junto con la plantilla
     */

    public function index(PlantillaService $plantilla)
    {
        $plantilla->setTitle('Inicio');
        return $plantilla->view("index");
    }

    /**
     * Carga la vista servicios junto con la plantilla
     */

    public function servicios(PlantillaService $plantilla)
    {
        $plantilla->setTitle('Servicios');
        return $plantilla->view("servicios");
    }

    /**
     * Carga la vista de preguntas frecuentes junto con la plantilla
     */
    
    public function faq(PlantillaService $plantilla)
{
    $plantilla->setTitle('FAQ');
    return $plantilla->view('faq');
}

}
