<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActuacionGenerada extends Mailable
{
    use Queueable, SerializesModels;

    public $actuacion;
    public $actuacionTipoEstado;
    public $actuacionDocumento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($actuacion, $actuacionTipoEstado, $actuacionDocumento)
    {
        $this->actuacion = $actuacion;
        $this->actuacionTipoEstado = $actuacionTipoEstado;
        $this->actuacionDocumento = $actuacionDocumento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.new_actuacion');
    }
}
