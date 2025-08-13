<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class PlantillaService
{
    private $view; // Vista a renderizar
    private $title = null; // Título de la página
    private $data = null; // Datos a pasar a la vista
    private $css_files = []; // Archivos CSS a incluir
    private $js_files = []; // Archivos JS a incluir
    private $user = null; // Usuario autenticado

    public function __construct()
    {
        $this->loadPlantillaFiles(); // Carga de archivos de la plantilla por defecto
        $this->user = Auth::user(); // Obtiene el usuario autenticado si existe
    }

    // Método para renderizar la vista con la plantilla
    public function view($view)
    {
        $this->view = $view; // Establece la vista a renderizar

        // Retorna la vista 'plantilla/plantilla' pasando las variables de la instancia actual
        return view('plantilla/plantilla', get_object_vars($this));
    }

    // Método para establecer el título de la página
    public function setTitle($title)
    {
        $this->title = $title;
    }

    // Método para establecer los datos a pasar a la vista
    public function setData($data)
    {
        $this->data = $data;
    }

    // Método para añadir un archivo CSS a la plantilla
    public function addCss($css)
    {
        $this->css_files[] = url($css) . '?timestamp=' . filemtime(public_path($css));
    }

    // Método para añadir un archivo JS a la plantilla
    public function addJs($js)
    {
        $this->js_files[] = url($js) . '?timestamp=' . filemtime(public_path($js));
    }

    // Método privado para cargar los archivos por defecto de la plantilla
    private function loadPlantillaFiles()
    {
        // Añade los archivos CSS y JS por defecto a la plantilla
        $this->addCss('assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css');
        $this->addCss('plantilla/css/plantilla.min.css');
        $this->addCss('plantilla/css/app.css');
        $this->addJs('plantilla/js/popper.min.js');
        $this->addJs('plantilla/js/plantilla.min.js');
    }
}
