<?php

namespace App\Mail;

use App\Reserva;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservaMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Reserva
     */
    public $reserva;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reserva $reserva)
    {
        $this->reserva = $reserva;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $event = $this->reserva->entrada->event;
        $reserva = $this->reserva;
        return $this->view('mails.reserva', compact('reserva', 'event'));
    }
}
