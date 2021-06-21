<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Event;
use App\Mail\ReservaMail;
use App\Reserva;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function show(Event $event)
    {
        return view('ticket', compact('event'));
    }

    public function reserva(Event $event, Entrada $entrada)
    {
        return view('reserva', compact('event', 'entrada'));
    }

    public function reservaPost(Event $event, Entrada $entrada)
    {
        $requested = request()->input('requested');
        $email = request()->input('email');
        //if ($entrada->disponibles() >= $requested) {
        $reserva = $entrada->reservas()->create([
            'email' => $email,
            'quantity' => $requested,
        ]);
        //}
        Mail::to($email)->send(new ReservaMail($reserva));
        return view('gracias', compact('event', 'entrada', 'reserva'));
    }
}
