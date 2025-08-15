<?php

namespace App\Http\Controllers;

use App\Services\PlantillaService;
use Illuminate\Http\Request;

class MundoanimalController extends Controller
{
    //

    public function index(PlantillaService $plantilla)
    {
        //$plantilla->addCss('css/index.css');
        $plantilla->setTitle('Inicio');
        return $plantilla->view("index");
    }

    public function servicios(PlantillaService $plantilla)
    {
        $plantilla->setTitle('Servicios');
        return $plantilla->view("servicios");
    }

    public function faq(PlantillaService $plantilla)
{
    $plantilla->setTitle('FAQ');
    return $plantilla->view('faq');
}
}
