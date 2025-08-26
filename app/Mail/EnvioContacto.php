<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnvioContacto extends Mailable
{
    use Queueable, SerializesModels;

    public $formulario; // Datos del formulario de contacto

    /**
     * Crear una nueva instancia del mensaje.
     */
    public function __construct($formulario)
    {
        $this->formulario = $formulario;
    }

    /**
     * Configurar la dirección y asunto del correo.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: ['samuelbonetweb@gmail.com'], // Correo de destino
            subject: 'Formulario de contacto Mundo Animal', // Asunto del correo
        );
    }

    /**
     * Configurar el contenido del mensaje.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.envio-contacto', // Vista para el correo
        );
    }
}
