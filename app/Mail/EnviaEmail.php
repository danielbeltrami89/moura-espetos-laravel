<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviaEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pedido_id;
    public $cliente_nome;
    public $cliente_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Seu pedido Moura Espetos')
                    ->markdown('emails.pedido-atualizado');
    }
}
